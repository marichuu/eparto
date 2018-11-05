
// rapport cap
$("a#rc_functionality").click(function(e) {
        e.preventDefault(); 
        var status = false;
        var status_old = true;
        
        if($("#rc_functionality_temoin").is(':checked')){
             status = true;
             status_old = false;
         }  
         $("#rc_functionality_div").find('input[type=checkbox]').each(function(){ 
             this.checked = status; 
             $("#rc_functionality_temoin").prop('checked', status_old);
         }); 
   });    

$("a#rc_functionality_view").click(function(e) {
        e.preventDefault(); 
        var status = false;
        var status_old = true;
        
        if($("#rc_functionality_view_temoin").is(':checked')){
             status = true;
             status_old = false;
         }  
         $("#rc_functionality_div .view").prop('checked', status); 
         $("#rc_functionality_view_temoin").prop('checked', status_old);
          
   });
   
   $("a#rc_functionality_create").click(function(e) {
        e.preventDefault(); 
        var status = false;
        var status_old = true;
        
        if($("#rc_functionality_create_temoin").is(':checked')){
             status = true;
             status_old = false;
         }  
         $("#rc_functionality_div .create").prop('checked', status); 
         $("#rc_functionality_create_temoin").prop('checked', status_old);
          
   });
   
   $("a#rc_functionality_update").click(function(e) {
        e.preventDefault(); 
        var status = false;
        var status_old = true;
        
        if($("#rc_functionality_update_temoin").is(':checked')){
             status = true;
             status_old = false;
         }  
         $("#rc_functionality_div .update").prop('checked', status); 
         $("#rc_functionality_update_temoin").prop('checked', status_old);
          
   });
   
   $("a#rc_functionality_disable").click(function(e) {
        e.preventDefault(); 
        var status = false;
        var status_old = true;
        
        if($("#rc_functionality_disable_temoin").is(':checked')){
             status = true;
             status_old = false;
         }  
         $("#rc_functionality_div .disable").prop('checked', status); 
         $("#rc_functionality_disable_temoin").prop('checked', status_old);
          
   });
 
 // fiche suivi
 $("a#fs_functionality").click(function(e) {
        e.preventDefault(); 
        var status = false;
        var status_old = true;
        
        if($("#fs_functionality_temoin").is(':checked')){
             status = true;
             status_old = false;
         }  
         $("#fs_functionality_div").find('input[type=checkbox]').each(function(){ 
             this.checked = status; 
             $("#fs_functionality_temoin").prop('checked', status_old);
         }); 
   });    

$("a#fs_functionality_view").click(function(e) {
        e.preventDefault(); 
        var status = false;
        var status_old = true;
        
        if($("#fs_functionality_view_temoin").is(':checked')){
             status = true;
             status_old = false;
         }  
         $("#fs_functionality_div .view").prop('checked', status); 
         $("#fs_functionality_view_temoin").prop('checked', status_old);
          
   });
   
   $("a#fs_functionality_create").click(function(e) {
        e.preventDefault(); 
        var status = false;
        var status_old = true;
        
        if($("#fs_functionality_create_temoin").is(':checked')){
             status = true;
             status_old = false;
         }  
         $("#fs_functionality_div .create").prop('checked', status); 
         $("#fs_functionality_create_temoin").prop('checked', status_old);
          
   });
   
   $("a#fs_functionality_update").click(function(e) {
        e.preventDefault(); 
        var status = false;
        var status_old = true;
        
        if($("#fs_functionality_update_temoin").is(':checked')){
             status = true;
             status_old = false;
         }  
         $("#fs_functionality_div .update").prop('checked', status); 
         $("#fs_functionality_update_temoin").prop('checked', status_old);
          
   });
   
   $("a#fs_functionality_disable").click(function(e) {
        e.preventDefault(); 
        var status = false;
        var status_old = true;
        
        if($("#fs_functionality_disable_temoin").is(':checked')){
             status = true;
             status_old = false;
         }  
         $("#fs_functionality_div .disable").prop('checked', status); 
         $("#fs_functionality_disable_temoin").prop('checked', status_old);
          
   });
   
   // parametrage
 $("a#param_functionality").click(function(e) {
        e.preventDefault(); 
        var status = false;
        var status_old = true;
        
        if($("#param_functionality_temoin").is(':checked')){
             status = true;
             status_old = false;
         }  
         $("#param_functionality_div").find('input[type=checkbox]').each(function(){ 
             this.checked = status; 
             $("#param_functionality_temoin").prop('checked', status_old);
         }); 
   });    

$("a#param_functionality_view").click(function(e) {
        e.preventDefault(); 
        var status = false;
        var status_old = true;
        
        if($("#param_functionality_view_temoin").is(':checked')){
             status = true;
             status_old = false;
         }  
         $("#param_functionality_div .view").prop('checked', status); 
         $("#param_functionality_view_temoin").prop('checked', status_old);
          
   });
   
   $("a#param_functionality_create").click(function(e) {
        e.preventDefault(); 
        var status = false;
        var status_old = true;
        
        if($("#param_functionality_create_temoin").is(':checked')){
             status = true;
             status_old = false;
         }  
         $("#param_functionality_div .create").prop('checked', status); 
         $("#param_functionality_create_temoin").prop('checked', status_old);
          
   });
   
   $("a#param_functionality_update").click(function(e) {
        e.preventDefault(); 
        var status = false;
        var status_old = true;
        
        if($("#param_functionality_update_temoin").is(':checked')){
             status = true;
             status_old = false;
         }  
         $("#param_functionality_div .update").prop('checked', status); 
         $("#param_functionality_update_temoin").prop('checked', status_old);
          
   });
   
   $("a#param_functionality_disable").click(function(e) {
        e.preventDefault(); 
        var status = false;
        var status_old = true;
        
        if($("#param_functionality_disable_temoin").is(':checked')){
             status = true;
             status_old = false;
         }  
         $("#param_functionality_div .disable").prop('checked', status); 
         $("#param_functionality_disable_temoin").prop('checked', status_old);
          
   });
   
   // users and profiles
 $("a#user_functionality").click(function(e) {
        e.preventDefault(); 
        var status = false;
        var status_old = true;
        
        if($("#user_functionality_temoin").is(':checked')){
             status = true;
             status_old = false;
         }  
         $("#user_functionality_div").find('input[type=checkbox]').each(function(){ 
             this.checked = status; 
             $("#user_functionality_temoin").prop('checked', status_old);
         }); 
   });    

$("a#user_functionality_view").click(function(e) {
        e.preventDefault(); 
        var status = false;
        var status_old = true;
        
        if($("#user_functionality_view_temoin").is(':checked')){
             status = true;
             status_old = false;
         }  
         $("#user_functionality_div .view").prop('checked', status); 
         $("#user_functionality_view_temoin").prop('checked', status_old);
          
   });
   
   $("a#user_functionality_create").click(function(e) {
        e.preventDefault(); 
        var status = false;
        var status_old = true;
        
        if($("#user_functionality_create_temoin").is(':checked')){
             status = true;
             status_old = false;
         }  
         $("#user_functionality_div .create").prop('checked', status); 
         $("#user_functionality_create_temoin").prop('checked', status_old);
          
   });
   
   $("a#user_functionality_update").click(function(e) {
        e.preventDefault(); 
        var status = false;
        var status_old = true;
        
        if($("#user_functionality_update_temoin").is(':checked')){
             status = true;
             status_old = false;
         }  
         $("#user_functionality_div .update").prop('checked', status); 
         $("#user_functionality_update_temoin").prop('checked', status_old);
          
   });
   
   $("a#user_functionality_disable").click(function(e) {
        e.preventDefault(); 
        var status = false;
        var status_old = true;
        
        if($("#user_functionality_disable_temoin").is(':checked')){
             status = true;
             status_old = false;
         }  
         $("#user_functionality_div .disable").prop('checked', status); 
         $("#user_functionality_disable_temoin").prop('checked', status_old);
          
   });
   
   //palette colour
   
   $(".colour_delete_other").click(function(e) { 
       $.ajax({
            'url': '../deleteColourOther',
            'type': 'POST',
            'data': 'id=' + jQuery(this).attr('id'),
            'success': function(data) {
                var container = $('#div_other');
                if (data) {
                    container.html(data);
                }
            }
        });
   });
   
   $(".colour_delete").click(function(e) {
       
       $.ajax({
            'url': '../deleteColour',
            'type': 'POST',
            'data': 'id=' + jQuery(this).attr('id'),
            'success': function(data) {
                var container = $('#div_percent');
                if (data) {
                    container.html(data);
                }
            }
        });
   });