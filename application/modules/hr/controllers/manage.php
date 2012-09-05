<?php

class Manage extends MX_Controller
{
   public function __construct()
   {
      parent::__construct();
	  $this->load->model('hr_model');
	  $this->load->module('site/site');
	  $this->site->use_js('hr/myjs');
   }
   
   public function _render()
   {

   }
   public function index()
   {
     $ainfo = array();
	 $aresult = $this->hr_model->get_data();
     $this->common->set_field_list(array('t'=>'title',"s"=>'status',"date"=>'date_created'),array('t'=>'desc'));
     $ainfo['aresult'] = $aresult;
	 $ainfo['common'] = $this->common;
	 $this->site->header();
     $this->site->content('site/left-navigator');
	 $this->load->view('body',$ainfo);
     $this->site->footer();
   } 

   public function expense()
   {
     $ainfo = array();
	 $aresult = $this->hr_model->get_data();
     $ainfo['aresult'] = $aresult;
	 $this->site->header();
     $this->site->content('site/left-navigator');
	 $this->load->view('expense',$ainfo);
     $this->site->footer();
   }  

   public function add()
   {
     $ainfo = array();
	 $aresult = $this->hr_model->get_data();
     $ainfo['aresult'] = $aresult;
	 $this->site->header();
     $this->site->content('site/left-navigator');
	 $this->load->view('add',$ainfo);
     $this->site->footer();
   }    
}