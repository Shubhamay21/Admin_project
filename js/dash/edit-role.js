$(document).ready(function(){
$('#save').on('click',function(){
$name = $('#nameid').val();
$.ajax({
  url:"actioneditrole.php",
  type:"POST",
  data:{name:$name},
  success:function(dataabc){
  window.location.href="editrole.php";
}});
});
});
