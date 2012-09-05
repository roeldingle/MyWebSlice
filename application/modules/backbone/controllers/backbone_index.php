<?php
class Backbone_index extends MX_Controller
{
   public function __construct()
   {
        parent::__construct();
		$this->load->module('site/site');
	    $this->site->use_js('backbone/libs/require');
		$this->site->use_js('backbone/apps/r_setup');
		// $this->site->use_js('http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js',false,true);
   }

   public function index()
   {
	  $this->site->header();      
      $this->site->footer();
   }
}
