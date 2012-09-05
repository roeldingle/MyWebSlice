<?php
class Userform extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->module('site/site');
		$this->load->model('mdl_userform');
    }

    public function add()
    {
        $userData               = array();
        $userData['username']   = $this->input->post('username', TRUE);
        $userData['password']   = $this->input->post('password', TRUE);
        $stat                   = $this->mdl_userform->addUser($userData);
        $result                 = array('stat'=>$stat);
        
        echo json_encode($result);
    }
}