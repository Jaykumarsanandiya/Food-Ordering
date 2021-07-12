jQuery("#frmRegister").on('submit',function(e){

jQuery.ajax({
    url:"login_register_submit.php",
    type:"post",
    data:jQuery("#frmRegister").serialize(),
    success:function(result){
        var data = jQuery.parseJSON(result);
    }
});
    e.preventDefault();
});