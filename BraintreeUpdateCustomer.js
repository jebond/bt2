$(document).ready(function() {
$('#customerinfoupdate').submit(function (event) {
  event.preventDefault();

  var customerid = $('#customerid1 option:selected').val();
  var firstnm = $('#firstname').val();
  var lastnm = $('#lastname').val();
  var companynm = $('#company').val();
  var phonenm = $('#phone').val();
  var faxnm = $('#fax').val();
  var emailnm = $('#email').val();
  var websitenm = $('#website').val();
  
  var params = {
    method: 'setuserinfo',
    customerID: customerid,
    firstname: firstnm,
    lastname: lastnm,
    company: companynm,
    phone: phonenm,
    fax: faxnm,
    email: emailnm,
    website: websitenm
  };
  
  $.ajax({
    type: "POST",
    url: "BraintreeTransaction.php",
    dataType: "json",
    data: JSON.stringify(params),
    complete: function(result,status,err) {
    $("#custresponse").html(result.responseText);
    $("#custresponse").css("display","block");  
    $("#custresponse").css("border-radius","10px");
    $("#custresponse").css("align","left");
    $("#custresponse").css("width","100%");
    $("#custresponse").css("color","blue");
    }
});
});
})