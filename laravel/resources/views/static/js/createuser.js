$(document).ready(function(){
$("#submit").click(function(){
var FirstName = $("#FirstName").val();
var LastName = $("#LastName").val();
var Email = $("#Email").val();
var _token = $('input[name=_token]').val()

// Returns successful data submission message when the entered information is stored in database.
var dataString = 'FirstName='+ FirstName + '&LastName='+ LastName + '&Email='+ Email + '&_token='+_token;
if(FirstName==''||LastName==''||Email=='')
{
alert("Please Fill All Fields");
}
else
{
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "adduser",
data: dataString,
cache: false,
success: function(result){
alert(result);
}
});
}
return false;
});
});