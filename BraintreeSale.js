$(document).ready(function() {
 
var authenticationtk = $("#authenticationdiv").text();
 braintree.client.create({
  authorization: authenticationtk
}, function(err, clientInstance) {
  if (err) {
    console.error(err);
    return;
  }

 braintree.hostedFields.create({
    client: clientInstance,
    styles: {
      'div': {
        'color': 'black'
      },
      ':focus': {
        'color': 'black'
      },
      '.valid': {
        'color': 'black'
      },
      '.invalid': {
        'color': 'black'
      }
    },
    fields: {
      number: {
        selector: '#card-number',
        placeholder: '4111 1111 1111 1111'
      },
      cvv: {
        selector: '#cvv',
        placeholder: '111'
      },
      expirationDate: {
        selector: '#expiration-date',
        placeholder: 'MM/YY'
      },
      postalCode: {
        selector: '#postal-code',
        placeholder: '11111'
      }
    }
  }, function(err, hostedFieldsInstance) {
    if (err) {
      console.error(err);
      return;
    }

$('#salecustomerinfo').submit(function (event) {
  event.preventDefault();

      hostedFieldsInstance.tokenize(function (err, payload) {
        
        if (err) {
          console.error(err);
          return;
        }

          var amountfield = '15.00';
          var customerid = Math.floor(Math.random() * (9999999999 - 1000 + 1)) + 1000;
          var firstnamefield = $('#txtfirstname').val();
          var lastnamefield = $('#txtlasttname').val();
          var streetaddressfield = $('#txtstreetaddress').val();
          var extendedaddressfield = $('#txtextendedaddress').val();
          var cityfield = $('#txtcityname').val();
          var statecodefield = $('#txtstatecidefield').val();
          var zipcodefield = $('#txtzipcode').val();
          var countrycodefield = $('#txtcountrycode').val();
          var companycodefield = $('#txtcompanyname').val();
          var phonefield = $('#txtphone').val();
          var faxfield = $('#txtfax').val();
          var emailfield = $('#txtemail').val();
          var websitefield = $('#txtwebsite').val();
          var cardholderfield = $('#txtcardholdername').val();

          var params = {
            method: 'sale',
            nonce: payload.nonce,
            amount: amountfield,
            customerID: customerid,
            firstname: firstnamefield,
            lastname: lastnamefield,
            streetaddress: streetaddressfield,
            extaddress: extendedaddressfield,
            locality: cityfield,
            region: statecodefield,
            postalcode: zipcodefield,
            countrycode: countrycodefield,
            company: companycodefield,
            phone: phonefield,
            fax: faxfield,
            email: emailfield,
            website: websitefield,
            cardholdername: cardholderfield
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
    });
  });
})
});