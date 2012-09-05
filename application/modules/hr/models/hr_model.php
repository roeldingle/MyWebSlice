<?php

class Hr_Model extends MX_Controller
{
   public function __construct()
   {
      parent::__construct();
   }
   
   public function get_data()
   {
      $query = $this->db->query("SELECT * FROM test");
	  return $query->result();
   }
}