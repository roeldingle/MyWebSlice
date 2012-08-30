<?php
if($acss_source){
  foreach($acss_source as $rows){
?>
<link rel="stylesheet" href="<?php echo $rows['sfile'];?><?php echo ($rows['cache']===true) ? "?cache=true" : "";?>"/>
<?php
  }
}