<?php

class Admin extends MX_Controller
{
   private $sSite = 'site_dark';
   private $sModule;
   
   public function __construct()
   {
      parent::__construct();   
      $this->load->module('core/app');	  
      //$this->load->module($this->sSite.'/template');
	 $this->app->use_css('admin/libs/bootstrap');
	 $this->app->use_css('admin/libs/bootstrap-responsive');
	 
	 $this->app->use_js('admin/libs/require');
	 $this->app->use_js('admin/apps/r_setup');
	  
	  $this->sModule = strtolower(__CLASS__);
      
   }
   
   public function index()
   {
	/*sample data*/
	//$aData['aMenuData'] = $this->getClass->select('tb_menu', '','rows');
	/*set data*/
	//$this->load->vars($aData);

	$this->app->header('admin/v_header');
	$this->app->content($this->sModule.'/v_'.$this->sModule);
	$this->app->footer('admin/v_footer');
	  
   }
}