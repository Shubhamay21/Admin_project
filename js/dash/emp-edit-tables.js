$(document).ready(function(){
$('#myform').on("submit",function(){
var fd = new FormData(this);
$.ajax({
  url:"emptableaction.php",
  type:"POST",
  data:fd,
  dataType:"JSON",
  contentType:false,
  cache:false,
  processData:false,
});
$.ajax({success:function(data){
  window.location.href="emptable.php";
  }
});
});
});

var modal= $('form');
// var btn= $('#mbtn');
var span= $('#save');
$(document).ready(function(){
span.on('click',function(){
modal.hide();
setTimeout('location.reload(true)',500);
history.go(0);
});
});

