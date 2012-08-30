<?php
if($aoptions){
   $soptions = "";
   foreach($aoptions as $key=>$val){
      $soptions .= $key . '=' . "'{$val}' ";
   }
?>
<form action="<?php echo $this->environment->exec_path;?>" name="<?php echo $aoptions['name'];?>" method="<?php echo $aoptions['method_type'];?>" class="<?php echo $aoptions['class']?>">
<input type="hidden" name="form-token" value="<?php echo $sform_token;?>"/>
<input type="hidden" name="m" value="<?php echo $aoptions['module'];?>" />
<input type="hidden" name="c" value="<?php echo $aoptions['controller'];?>"  />
<input type="hidden" name="cm" value="<?php echo $aoptions['method'];?>"  />
<?php
}
?>
