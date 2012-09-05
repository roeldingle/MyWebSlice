<script type="text/javascript">
var urls = {
   base_url : '<?php echo base_url();?>',
   current_url : '<?php echo current_url();?>',
   ajax_url : '<?php echo $ajax_path;?>',
   exec_url : '<?php echo $exec_path;?>'
}
</script>
<?php
if($ajs_source): 
   foreach($ajs_source as $rows):
      $sattributes = "";
      if(isset($rows['attributes'])){
         foreach($rows['attributes'] as $key=>$val){
            $sattributes .= " " . $key . '="' . $val . '"'; 
         }
      }
?>
<script type="text/javascript" src="<?php echo $rows['sfile'];?><?php echo ($rows['cache']===true) ? "?cache=true": "";?>"<?php echo $sattributes;?>></script>
<?php
  endforeach;
endif;
?>
<?php if($bjquery===true):?>
<script type="text/javascript">
jQuery(document).ready(function($){
   $(".show-per-rows").change(function(){
      this.query_string = "<?php echo  $this->common->qry_str_builder('row');?>";
      site.row(this);    
   });
   $(".check-all").click(function(){
      var this_row = $(this);
      var is_checked = this_row.is(":checked");
      $('.row-list').attr("checked",is_checked);
   });
});
</script>
<?php endif;?>