braintree.client.create({
  authorization: authentication
}, function(err, clientInstance) {
  if (err) {
    console.error(err);
    return;
  }

  braintree.hostedFields.create({
    client: clientInstance,
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
        placeholder : '12345'
      }
    }
  }, function(err, hostedFieldsInstance) {
    if (err) {
      console.error(err);
      return;
    }

    hostedFieldsInstance.on('focus', function (event) {
      var field = event.fields[event.emittedBy];
      
      $(field.container).next('.hosted-field--label').addClass('label-float').removeClass('filled');
    });
    
    // Emulates floating label pattern
    hostedFieldsInstance.on('blur', function (event) {
      var field = event.fields[event.emittedBy];
      
      if (field.isEmpty) {
        $(field.container).next('.hosted-field--label').removeClass('label-float');
      } else if (event.isValid) {
        $(field.container).next('.hosted-field--label').addClass('filled');
      } else {
        $(field.container).next('.hosted-field--label').addClass('invalid');
      }
    });
    
    hostedFieldsInstance.on('empty', function (event) {
      var field = event.fields[event.emittedBy];

      $(field.container).next('.hosted-field--label').removeClass('filled').removeClass('invalid');
    });
    
    hostedFieldsInstance.on('validityChange', function (event) {
      var field = event.fields[event.emittedBy];

      if (field.isPotentiallyValid) {
        $(field.container).next('.hosted-field--label').removeClass('invalid');
      } else {
        $(field.container).next('.hosted-field--label').addClass('invalid');  
      }
    });

$('#userids').submit(function (event) {
  event.preventDefault();
  var customerid = $('#customerid option:selected').val();
  var newfirstname = $('#newFirstName').val();
  var newlastname = $('#newLastName').val();
  var newphonenumber = $('#newPhone').val();
  var newfaxnumber = $('#newFax').val();
  var newemail = $('#newEmail').val();
  var newwebsite = $('#newWebsite').val();
  var newcompanyname = $('#newCompanyName').val();
  //alert(customerid);
  var params = {
    method: 'userlookup',
    customerID: customerid,
    firstname : newfirstname,
    lastname : newlastname,
    company : newcompanyname,
    email : newemail,
    phone : newphonenumber,
    fax : newfaxnumber,
    website : newwebsite
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

    $('#cardForm').submit(function (event) {
      event.preventDefault();

      hostedFieldsInstance.tokenize(function (err, payload) {
        if (err) {
          $("#response").html(err);
          $("#response").css("display","block");  
          $("#response").css("border-radius","10px");
          $("#response").css("align","center");
          $("#response").css("width","100%");
          return;
        }

        var frstname = $("#firstnametxt").val();
        var lstname = $("#lastnametxt").val();
        var strtaddress = $("#billingaddstreettxt").val();
        var exttaddress = $("#extaddresstxt").val();

        var params = {
          nonce: payload.nonce , 
          customerID: Math.floor(Math.random()*10000) , 
          amount: "15.00", 
          firstname: frstname, 
          lastname: lstname,
          cardholdername: frstname + " " + lstname,
          company: 'company', 
          phone: '999-999-999', 
          fax: '123-123-1234', 
          website: 'www.website.com', 
          streetaddress: strtaddress, 
          extaddress: exttaddress, 
          locality: 'City', 
          region: 'TN', 
          postalcode: '12345', 
          countrycode: 'US',
          email: 'test@testemail.com',
          method: 'sale'
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
  });
});
});