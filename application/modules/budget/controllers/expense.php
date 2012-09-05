<?php
class Expense extends MX_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->module('site/site');
      $this->site->use_css('budget/jobert');
   }

   public function index()
   {
      $ainfo['common'] = $this->common;
      $this->load->vars($ainfo);
      $this->common->set_field_list(array('t'=>'title',"s"=>'status',"date"=>'date_created'),array('t'=>'desc'));
      $this->site->header();
      $this->site->content('budget/left-navigator');
      $this->site->content('budget/expense');
      $this->site->footer();
   }

   public function add_expense()
   {
         $this->site->header();
      $this->site->content('budget/left-navigator');
      $this->site->content('budget/add-expense');
      $this->site->footer();
   }
}