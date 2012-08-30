var site = {
   row : function(element){
      var rows = $(element);
      window.location = urls.current_url + "?row=" + rows.val() + element.query_string;
   },message : function(){
       
   },close_dialog : function(element_obj,callback){
       element_obj.dialog('close');
       callback();
   }
}