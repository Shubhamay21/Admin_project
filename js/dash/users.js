$(document).ready(function(){
    $('#myform').onclick(function(e){
        e.preventDefault();
    $.ajax({
      url:"userdata.php",
      type:"POST",
      data:fd,
      dataType:"JSON",
      success:function(data){
       
        }
    });
  });
});
    