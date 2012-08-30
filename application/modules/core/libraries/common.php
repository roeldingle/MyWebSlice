<?php

class Common extends MX_Controller
{
   private $asort_field = array();
   private $adefault_field = '';
   private $sdefault_order = 'desc';

   public function __construct()
   {
      parent::__construct();
      $this->environment->assets_path;
   }

   public function pager($itotal_rows , $ilimit,$aclass = array())
   {
      $iinterval = 2;
      $sqry_string = $this->qry_str_builder('page');
      $itotal_page = ceil($itotal_rows/$ilimit);
      $iqry_page = isset($_GET['page']) ? $_GET['page'] : 1;
      $ifilter_page = filter_var($iqry_page,FILTER_VALIDATE_INT);

      $ipage = ($ifilter_page === "") ? 1 : $ifilter_page;
      
      if($ipage > $itotal_page){
         $ipage = $itotal_page;
      }

      $snext = ($ipage == 1) ? "<li class='disabled'><a>&laquo;</a></li>" : "<li><a href='?page=". ($ipage-1) . "{$sqry_string}' >&laquo;</a></li>";
      $sprev = ($ipage == $itotal_page) ? "<li class='disabled'><a>&raquo;</a></li>" : "<li><a href='?page=". ($ipage+1) . "{$sqry_string}' >&raquo;</a></li>";

      $shtml = "";
      $shtml .= "<div class='pagination no_margin'>";
      $shtml .= "<ul>";

      $shtml .= $snext ;
      for ($ilink = 1; $ilink <= $itotal_page; $ilink++){
         if ($ilink == 2 && $ipage >= ($iinterval + 3)){
            $shtml .= "<li><a href='?page=1{$sqry_string}' >1</a></li><li><a>&nbsp;&hellip;&nbsp;</a></li>";
         }elseif($ilink == 1 && $ipage == ($iinterval + 2)){
            $shtml .= "<li><a href='?page=1{$sqry_string}'>1</a>&nbsp;</li>";
         }
         if ($ilink == $ipage){
            $shtml .= "<li class='active'><a>$ipage</a>&nbsp;</li>";
         }elseif ($ilink >= ($ipage - $iinterval)){
            $shtml .= "<li><a href='?page=$ilink{$sqry_string}' >$ilink</a>&nbsp;</li>";
         }
         if ($ilink >= ($ipage + $iinterval) && ($itotal_page - ($iinterval + 2)) >= $ipage){
            $shtml .= "<li><a>&hellip;&nbsp;</a></li><li><a href='?page=$itotal_page'>$itotal_page</a></li>";
            break;
         }
      }
      $shtml .= $sprev;
      $shtml .="</ul>";
      $shtml .="</div>";
      return $shtml;
   }

   public function qry_str_builder($skey)
   {
      $aqry_array = array();
      $anew_qry = array();
      $sqry = $_SERVER['QUERY_STRING'];
      parse_str($sqry,$aqry_array);

      foreach($aqry_array as $key=>$val){
         if($key!=$skey){
            $anew_qry[$key] = $val;
         }
      }
      $sseparator = ($anew_qry) ? "&" : "";
      $sqry_string = $sseparator . http_build_query($anew_qry,'&');
      return $sqry_string;
   }

   public function set_field_list($afield = array(),$adefault_field)
   {
      if($afield){
         $this->asort_field = $afield;
         $this->adefault_field = $adefault_field;
      }
   }
   
   public function sql_groupby()
   {
       $aallowed = array("desc","asc");
       $adefault = array_keys($this->adefault_field);

       if(isset($_GET['sort']) && isset($_GET['order'])){
           $ssort = $_GET['sort'];
           $sorder = in_array($_GET['order'],$aallowed) ? $_GET['order'] : "desc";
           if(array_key_exists($_GET['sort'],$this->asort_field)){
              return "GROUB BY {$this->asort_field[$ssort]} {$sorder}";
           }else{
              return  "GROUB BY {$this->asort_field[$adefault[0]]} {$this->adefault_field[$adefault[0]]}";
           }
       }else{
              return  "GROUB BY {$this->asort_field[$adefault[0]]} {$this->adefault_field[$adefault[0]]}";
       }
   }
   
   public function sql_limit($itotal_rows,$iper_page)
   {
      $ipage = isset($_GET['page']) ? $_GET['page'] : 1;
      $ifilter_page = filter_var($ipage,FILTER_VALIDATE_INT);
      $ipage = ($ifilter_page==="") ? 1 : $ifilter_page;
      $itotal_page = ceil($itotal_rows/$iper_page);

      if($ipage > $itotal_page){
         $ipage = $itotal_page;
      }

      $ioffset = ($ipage - 1) * $iper_page;
      return "LIMIT " . $ioffset . ", " . $iper_page;

   }

   public function list_sorter($skey = "",$ssort_default = "desc")
   {
      $aqry_array = array();
      $anew_qry = array();
      $sqry = $_SERVER['QUERY_STRING'];

      $anew_field = array_merge(array('sort'=>'sort','order'=>'order'),$this->asort_field);
      $this->asort_field = $anew_field;
      $this->sdefault_sort = $ssort_default;

      if($this->asort_field){
         $aallowed = array("desc","asc");
         $ssort_default = strtolower($ssort_default);
         $ssort = "";
         if(!in_array($ssort_default,$aallowed)){
            return false;
         }

         if((isset($_GET['sort']) && $_GET['sort']) && (isset($_GET['order']) && $_GET['order'])){
		 
            if(in_array($_GET['order'],$aallowed)){
               $ssort = ($_GET['order']=="desc") ?  "asc" : "desc";
            }else{
              $ssort = $ssort_default;
            }
         
		 }else{
            
			if($ssort_default = "desc"){
               $ssort = "desc";
            }else{
               $ssort = $aallowed[0] ;
            }
         }
         parse_str($sqry,$aqry_array);
         if($aqry_array){
           foreach($aqry_array as $key=>$val){
               if(!array_key_exists($key,$this->asort_field)){
                  $anew_qry[$key] = $val;
               }
           }
         }
         $afield = array_keys($this->asort_field,$this->asort_field[$skey]);

         $sseparator = ($anew_qry) ? "&" : "";
         $sqry_string = $sseparator . http_build_query( $anew_qry,'&');

         return "?sort={$afield[0]}&order=" . urlencode($ssort) .  $sqry_string;
      }
   }

   public function curl_request( $url , $param = null)
   {
      $cl = curl_init();
      $opts[CURLOPT_RETURNTRANSFER] = 1;
      $opts[CURLOPT_URL] = $url;

      if(is_null($param) === false){
         $opts[CURLOPT_POST] = true;
         $opts[CURLOPT_POSTFIELDS] = $param;
      }
      curl_setopt_array($cl, $opts);
      return curl_exec($cl);
  }

   public function form_submit($aoptions)
   {
      $ainfo['aoptions'] = $aoptions;
      $this->session->set_userdata(array('form-token' => md5(uniqid(rand(), true))));
      $ainfo['sform_token'] =  $this->session->userdata('form-token');
      if(is_array($aoptions)){
         $sform = $this->load->view('site/form-submit',$ainfo,TRUE);
         echo $sform;
      }
   }
   
   public function limit_string($sstr , $sper_str , $sstyle = '...')
   {
      $countStr = strlen($sstr);
      $resultStr = '';

      if($countStr < $sper_str){
         return $sstr;
      }else{
        for( $i = 0 ; $i < $sper_str ; $i++ ){
           if( $i <= $sper_str  ){
             $resultStr .= $sstr [$i];
           }
        }
        return $resultStr . $sstyle;
      }
   }
   
   public function message($smessage,$smessage_type)
   {
      
   }

   public function vd($var)
   {
      echo "<pre>";
      var_dump($var);
      echo "</pre>";
   }
}