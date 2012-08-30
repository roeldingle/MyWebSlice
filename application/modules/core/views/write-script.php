<?php
if($awrite_script){
?>
<script type="text/javascript">
<?php
   foreach($awrite_script as $rows){
      echo $rows . PHP_EOL;
   }
?>
</script>
<?php
}
?>
