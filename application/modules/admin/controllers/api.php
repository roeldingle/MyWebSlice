<?php


class Api extends MX_Controller{

	function test(){
	
		$aData = $this->getClass->select("tb_menu");
		echo json_encode($aData);
	
	}




}