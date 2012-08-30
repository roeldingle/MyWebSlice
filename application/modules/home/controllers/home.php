<?php

class Home extends MX_Controller
{
   private $sSite = 'site_dark';
   private $sModule;
   
   public function __construct()
   {
      parent::__construct();   
      $this->load->module('core/app');	  
      $this->load->module($this->sSite.'/template');
	  $this->app->use_js('home/apps/custom');	  
	  
	  $this->sModule = strtolower(__CLASS__);
      
   }
   
   public function index()
   {
	/*sample data*/
	$aData['aMenuData'] = $this->getClass->select('tb_menu', '','rows');
	/*set data*/
	$this->load->vars($aData);

	$this->template->header();
	$this->app->content($this->sModule.'/v_'.$this->sModule);
	$this->template->footer();
	  
   }
}