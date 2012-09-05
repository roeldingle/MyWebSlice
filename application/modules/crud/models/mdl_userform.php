<?php

class Mdl_userform extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

	public function addUser($aData)
	{
	    // $query = $this->db->query('SELECT * FROM tbl_user');
        $data = array(
            'username' => $aData['username'],
            'password' => sha1($aData['password'])
        );

        $query  = $this->db->insert('tbl_user', $data); 
		return $query;
	}
}