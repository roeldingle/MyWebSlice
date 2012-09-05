<?php

class Template extends MX_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->module('core/app');
	  //$this->load->model('getClass');
	  $this->app->use_css('site_dark/libs/bootstrap');
	  $this->app->use_css('site_dark/libs/bootstrap-responsive');
	  $this->app->use_css('site_dark/libs/animate');
	  
	  $this->app->use_js('site_dark/libs/bootstrap');	
   }
   
   public function header()
   {
      $this->app->header('site_dark/header');
   }
   
     public function footer()
   {
      $this->app->footer('site_dark/footer');
   }
   
     /*
   * gives the menu/module
   */
   public function get_menu()
   {
	$nav_menu = $this->getClass->select("tb_menu");
	
	/*get the current url*/
	$sData = '';
	/*loop the menu/module data*/
	foreach($nav_menu as $key=>$val){
		$sData .= '<li id="page_id_'.$key.'"></i><a href="javascript: Home.page('.$key.');" >'.$val['tm_name'].'</a></li>';
	}
	return $sData;
	
   }
}