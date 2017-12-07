$(document).ready(function() {
$('#customerinfo').submit(function (event) {
  alert("im called");
  var customerid = $('#customerid1 option:selected').val();
  
  var params = {
    method: 'getuserinfo',
    customerID: customerid
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
    $("#custresponse").css("align","center");
    $("#custresponse").css("width","100%");
    $("#custresponse").css("color","blue");
    }
});
});
}