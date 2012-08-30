<?php

class Request extends MX_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('core_model');
   }

   public function exec()
   {
      $oinput = $this->input;
      $srequest_type = $_SERVER['REQUEST_METHOD'];
      $stoken = $oinput->get_post('form-token');
      $atoken = $this->core_model->get_token($stoken);

      if(!$atoken && $this->session->userdata('form-token')){
        $this->core_model->insert_token($stoken);
        $this->session->unset_userdata(array('submit-count' =>''));
        if($srequest_type=="POST"){
           if($oinput->post('m') && $oinput->post('c') && $oinput->post('cm')){
             if($this->load->module($oinput->post('m') . '/' . $oinput->post('c'))){
                $scontroller = $oinput->post('c');
                $smethod = $oinput->post('cm');
                $this->$scontroller->$smethod();
             }
           }else{
              show_404();
           }
        }elseif($srequest_type=="GET"){
           if($oinput->get('m') && $oinput->get('c') && $oinput->get('cm')){
             if($this->load->module($oinput->get('m') . '/' . $oinput->get('c'))){
                $scontroller = $oinput->get('c');
                $smethod = $oinput->get('cm');
                $this->$scontroller->$smethod();
             }
           }else{
              show_404();
           }
        }
      }else{
          show_404();
      }
   }
   
   public function ajax()
   {

   }
   
   public function assets()
   {
      $smodule_name = $this->uri->rsegment(3);
      $smodule_path = APPPATH . 'modules/' . $smodule_name;
      $search = array(
         '/\}[^\S ]+/s',
         '/[^\S ]+\{/s',
         '/(\s)+/s'
      );
	
      $replace = array(
         '}',
         '{',
          '\\1'
      );
      if($smodule_name){
          $asegment = $this->uri->rsegment_array();
          array_splice($asegment,0,3);
          if($asegment){
             $snext_path = "";
             foreach($asegment as $key=>$val){
                $snext_path .= (($key==0) ? "" : "/" ) . $val;
             }
             $srequest_file = $smodule_path . '/assets/'. $snext_path;
             if(file_exists($smodule_path . '/assets/'. $snext_path)){
                $apath_info = pathinfo($srequest_file);

                if(!isset($apath_info['extension'])){
                   show_404();
                }
                $sfolder = "";

                switch($apath_info['extension']){
                   case'css':
                      $sfolder = "css";
                      header("Content-type: text/css", true);
                      header("Cache-Control: private, max-age=10800, pre-check=10800");
                      header("Pragma: private");
                      header("Expires: " . date(DATE_RFC822,strtotime(" 2 day")));
                   break;
                   case'js':
                      $sfolder = "js";
                      header("Content-type: text/javascript", true);
                      header("Cache-Control: private, max-age=10800, pre-check=10800");
                      header("Pragma: private");
                      header("Expires: " . date(DATE_RFC822,strtotime(" 2 day")));
                   break;
                   
                   case'jpg':
                      header('Content-type: image/jpeg');
                      header("Cache-Control: private, max-age=10800, pre-check=10800");
                      header("Pragma: private");
                      header("Expires: " . date(DATE_RFC822,strtotime(" 2 day")));
                      readfile($srequest_file);
                      exit();
                   break;
                   case'gif':
                      header('Content-type: image/gif');
                      header("Cache-Control: private, max-age=10800, pre-check=10800");
                      header("Pragma: private");
                      header("Expires: " . date(DATE_RFC822,strtotime(" 2 day")));
                      readfile($srequest_file);
                      exit();
                   break;

                   case'png':
                      header('Content-type: image/png');
                      header("Cache-Control: private, max-age=10800, pre-check=10800");
                      header("Pragma: private");
                      header("Expires: " . date(DATE_RFC822,strtotime(" 2 day")));
                      readfile($srequest_file);
                      exit();
                   break;

                   case'swf':
                      header('Content-type: application/x-shockwave-flash');
                      readfile($srequest_file);
                      exit();
                   break;
                   case'bmp':
                      header('Content-type: image/bmp');
                      header("Cache-Control: private, max-age=10800, pre-check=10800");
                      header("Pragma: private");
                      header("Expires: " . date(DATE_RFC822,strtotime(" 2 day")));
                      readfile($srequest_file);
                      exit();
                   break;
                   
                   case'tiff':
                      header('Content-type: image/tiff');
                      readfile($srequest_file);
                      exit();
                   break;
                   
                   case'swf':
                      header('Content-type: application/x-shockwave-flash');
                      readfile($srequest_file);
                      exit();
                   break;
                }

                $scache_path = $smodule_path . '/cache/' . $sfolder . '/';
                $sfile_path = $smodule_path . '/assets/'. $snext_path;
                $sfile_name = $apath_info['filename'] . ".{$apath_info['extension']}";
                $sfile_modified = filemtime($sfile_path);

                $sencrypt = md5($sfile_modified) . '-' . md5($sfile_name) .".{$apath_info['extension']}";

                if(is_dir($scache_path)){
                    $scached_file = $scache_path . $sencrypt;
                    if(!file_exists($scached_file)){

                       $afile = glob ( $scache_path . '*-' . md5($sfile_name). ".{$apath_info['extension']}" );
                       if($afile){
                           foreach($afile as $rows){
                              unlink($rows);
                           }
                       }
                       
                       ob_start();
                       echo "/* Generated on :" .date("Y-m-d H:i:s",time()) . "*/\n";
                       require_once($srequest_file);

                       $soutput = ob_get_clean();
                       $soutput =  str_replace("ASSETS",$this->environment->asset_path,$soutput);
                       $soutput = preg_replace($search, $replace, $soutput);
                       
                       $screate_cache = fopen($scached_file ,'w');
                       fwrite($screate_cache,$soutput);
                       fclose($screate_cache);
                       echo $soutput;

                    }else{
					        require_once($scache_path . $sencrypt);
                    }
                }else{
                    require_once($srequest_file);
                }
                
             }else{
                show_404();
             }
          }else{
              show_404();
          }
      }else{
         show_404();
      }
   }
}