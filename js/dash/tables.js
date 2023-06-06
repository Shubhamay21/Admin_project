$('#save').on('click',function () { 
if($('#passid').val()==0){alert("All Filled Required to Fill First!");
}else{
$name = $('#nameid').val();
$email = $("#emailid").val();
$password = $('#passid').val();
  $.ajax({
  url:"insert.php",
  type:"POST",
  data:{nm:$name,em:$email,pwd:$password},
  success:function(data){
    window.location.href="tables.php";
  }});
}});
