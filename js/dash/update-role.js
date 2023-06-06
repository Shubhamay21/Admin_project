$(document).ready(function(){
    $('#save').on('click',function(){
    $id=$("#postid").val();
    //alert($id);
    $name = $('#nameid').val();
    $.ajax({
      url:"updaterole.php",
      type:"POST",
      data:{postid:$id,name:$name},
      success:function(dataabc){
      window.location.href="editrole.php";
    }});
    });
    });
    