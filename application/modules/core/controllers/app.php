<?php

class App extends MX_Controller
{
   public $ajs_source = array();
   public $acss_source = array();
   public $awrite_script = array();
   public $awrite_style = array();
   private $bload_jquery = true;

   private static $ijs_counter = 3;   
   
   public function __construct()
   {
      parent::__construct();
      $ainfo['assets_path'] = $this->environment->assets_path;
      $ainfo['exec_path'] = $this->environment->exec_path;
      $ainfo['ajax_path'] = $this->environment->ajax_path;
      $this->load->vars($ainfo);
   }

   public function _remap()
   {    
      show_404();
   }

   public function header($sfile_override = "",$aheader_info = array())
   {
      $adata = array();
      $ainfo = array();
      $sview = "";
      $bjquery_ui_css = true;
      if($aheader_info!==NULL){
          if(array_key_exists('jquery_ui_css',$aheader_info)){
             if($aheader_info['jquery_ui_css']===false){
                $bjquery_ui_css = false;
             }
          }
      }

      if($bjquery_ui_css===true){
         $this->acss_source[] = array('sfile' => $this->environment->sjquery_ui_css_url,"cache" => true );                 
      }
      
      $ainfo['acss_source'] = $this->acss_source;
      $ainfo['awrite_style'] = $this->awrite_style;
      
      $this->load->vars($ainfo);
      if($sfile_override==""){
         return false;
      }else{
        $sview = $this->load->view($sfile_override,$aheader_info,TRUE);
      }
      ob_start();
      echo $sview;
      $soutput = ob_get_clean();
      $scss_output = $this->load->view('css-loader','',TRUE);
      $swrite_style = $this->load->view('write-style','',TRUE);
      $output = preg_replace("|</head>.*?<body>|is", "{$scss_output}{$swrite_style}</head>\n<body>", $soutput);
      $adata['soutput'] = $output;
      $this->load->view('create-header',$adata);
   }

   public function footer($sfile_override = "",$aheader_info = array())
   {
      $ainfo = array();
      $adata = array();
      $sview = "";
      $bjquery = true;
      $bjquery_ui_js = true;

      if($aheader_info!==NULL){
         if(array_key_exists('jquery',$aheader_info)){
            if($aheader_info['jquery']===false){
               $bjquery = false;
            }
         }
         
         if(array_key_exists('jquery_ui_js',$aheader_info)){
            if($aheader_info['jquery_ui_js']===false){
               $bjquery_ui_js = false;
            }
         }           
      } 
      
      if($bjquery===true){
         $this->ajs_source[0] = array("sfile" => $this->environment->sjquery_js_url, "cache" => true);      
      }

      if($bjquery_ui_js===true){
         $this->ajs_source[1] = array("sfile" => $this->environment->sjquery_ui_js_url, "cache" => true);
      }
      $ainfo['bjquery'] = $bjquery;
      
      $this->ajs_source[2] = array("sfile" => $this->environment->ssite_js, "cache" =>true);
      ksort($this->ajs_source);
      
      $ainfo['ajs_source'] = $this->ajs_source;
      $ainfo['awrite_script'] = $this->awrite_script;
      
      $this->load->vars($ainfo);
      
      if($sfile_override==""){
        $sview = $this->load->view(__FUNCTION__,'',TRUE);

      }else{
        $sview = $this->load->view($sfile_override,$aheader_info,TRUE);
      }
      
      ob_start();
      echo $sview;
      $soutput = ob_get_clean();

      $sjs_output = $this->load->view('script-loader','',TRUE);
      $swrite_script = $this->load->view('write-script','',TRUE);
      $output = preg_replace("|</body>.*?</html>|is", "{$sjs_output}{$swrite_script}</body></html>", $soutput);

      $adata['soutput'] = $output;
      $this->load->view('create-footer',$adata);
   }
   
   public function content($sfile,$ainfo = array())
   {
      $this->load->view($sfile,$ainfo);
   }
   
   private function _get_file_path($sfile,$stype)
   {
      $apath_info = pathinfo($sfile);
      $spath = "";
      if($apath_info['dirname']==='.'){
      
        return false;      
      }else{
      
         $asegment = explode('/',$apath_info['dirname']);
         $asegment_temp = $asegment;
         $smodule_name = $asegment[0];

         array_splice($asegment,0,1);
         $sfile_path = "";

         if($asegment_temp){
            $spath = "";

            foreach($asegment as $key => $val){
               $spath .= (($key==0) ? "" : "/" ) . $val;
            }

            $spath_separator = (count($asegment)===0) ? '' : '/';
            $sfile_path = $this->environment->assets_path . $smodule_name . "/{$stype}/" . $spath . $spath_separator . $apath_info['filename'];
            return $sfile_path;
         }
      }
   }
   
   public function use_css($sfile, $bcache = false)
   {   
      if(filter_var($sfile,FILTER_VALIDATE_URL)){
         $aurl = parse_url($sfile);
         if($_SERVER['HTTP_HOST']===$aurl['host']){
            $this->acss_source[] = array('sfile' => $sfile,"cache" => false);
         }else{
            $this->acss_source[] = array('sfile' => $sfile,"cache" => $bcache);
         }
      }else{
         $apath_info = pathinfo($sfile);
         if($apath_info['dirname']==='.'){
            return false;
         }else{
            $this->acss_source[] = array("sfile" => $this->_get_file_path($sfile,'css') . '.css',"cache" => $bcache);
         }      
      }    
   }   
   
   public function use_js($sfile, $bcache = false)
   {   
      if(filter_var($sfile,FILTER_VALIDATE_URL)){
         $aurl = parse_url($sfile);
         if($_SERVER['HTTP_HOST']===$aurl['host']){
            $this->ajs_source[] = array('sfile' => $sfile,"cache" => false);
         }else{
            $this->ajs_source[] = array('sfile' => $sfile,"cache" => $bcache);
         }        
      }else{
         $apath_info = pathinfo($sfile);      
         $this->ajs_source[self::$ijs_counter++] = array("sfile" => $this->_get_file_path($sfile,'js') . '.js',"cache" => $bcache);              
      }     
   }

   public function write_script($sscript)
   {
      if($sscript){
         $this->awrite_script[] = $sscript;
      }     
   }
   
   public function write_style($sstyle)
   {
      if($sstyle){
         $this->awrite_style[] = $sstyle;
      }
   }
   
   public function show_rows($idefault_row = 20,$arows = array(10,20,30,50))
   {
      $ainfo = array();
      $iset_row = isset($_GET['row']) ? $_GET['row'] : $idefault_row;
	   $irow = filter_var($iset_row,FILTER_VALIDATE_INT);
      $irow = ( $irow==="" ) ? $idef_row : $irow;
	  
      $ainfo['idefault_row'] = $idefault_row;      
      $ainfo['arows'] = $arows;
      $ainfo['irow'] = $irow;
      
	   $this->load->view('show-row',$ainfo);
   }
}