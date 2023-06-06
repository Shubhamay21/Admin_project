$(document).ready(function(){
$('#save').on('click',function(){
$id=$("#postid").val();
//alert($id);
$name = $('#nameid').val();
$email = $("#emailid").val();
$pwd = $("#passid").val();
$.ajax({
  url:"tableaction.php",
  type:"POST",
  data:{postid:$id,name:$name,email:$email,password:$pwd},
  success:function(dataabc){
  window.location.href="tables.php";
}});
});
});
