<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
		if( $this->require_role('admin, user, businesspartner, menager') )
		{
        $this->user = $this->db->get_where('users', array('user_id' => $this->auth_data->user_id), 1)->row();
		}
    }

    public function getChats()
    {
        header('Content-Type: application/json');
        if ($this->input->is_ajax_request()) {
            // Find friend
            $friend = $this->db->get_where('users', array('user_id' => $this->input->post('chatWith')), 1)->row();

            // Get Chats
            $chats = $this->db
                ->select('chat.*, users.username')
                ->from('chat')
                ->join('users', 'chat.send_by = users.user_id')
                ->where('(send_by = '. $this->user->user_id .' AND send_to = '. $friend->user_id .')')
                ->or_where('(send_to = '. $this->user->user_id .' AND send_by = '. $friend->user_id .')')
                ->order_by('chat.time', 'desc')
                ->limit(100)
                ->get()
                ->result();

            $result = array(
                'username' => $friend->username,
                'chats' => $chats
            );
            echo json_encode($result);
        }
    }

    public function sendMessage()
    {
		if( $this->require_role('admin, user, businesspartner, menager') )
		{
        $this->db->insert('chat', array(
            'message' => htmlentities($this->input->post('message', true)),
            'send_to' => $this->input->post('chatWith'),
            'send_by' => $this->auth_data->user_id
        ));
		}
    }
}