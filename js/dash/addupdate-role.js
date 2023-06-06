$(document).ready(function(){
    $('#save').on('click',function(){
    $id=$("#postid").val();
    //alert($id);
    $name = $('#nameid').val();
    $email = $('#emailid').val();
    $role = $('#roleid').val();
    $.ajax({
      url:"updateaddrole.php",
      type:"POST",
      data:{postid:$id,name:$name,email:$email,role:$role},
      success:function(dataabc){
      window.location.href="addrole.php";
    }});
    });
    });
    