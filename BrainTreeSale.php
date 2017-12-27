<?php
require_once 'BraintreeTransaction.php';
Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('gx7yfcfb8k4rnxzr');
Braintree_Configuration::publicKey('m2f9dj3m7fd9wb6m');
Braintree_Configuration::privateKey('862195f02b6731dccb8762baf1bb9ee8');
$clientToken = Braintree_ClientToken::generate();
echo ("<div style='display:none;' id='authenticationdiv'>". $clientToken ."</div>");
?>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="braintreetest.css" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="skeleton.css">
<div class="type-1">
  <div class="w3-container">
    <div class="w3-panel w3-blue w3-card-4">
    <h2>BrainTree Baby - Braintree Sale</h2>
    <a href="braintreetest.php" class="btn btn-1">
      <span class="txt">Back to Main</span>
      <span class="round"><i class="fa fa-chevron-right"></i></span>
    </a>
  	<br>
  <br>
  </div>
 </div>
</div>
<div id="container">
<div id="custresponse" style="display:none"></div>
<form id="salecustomerinfo" method="POST">
<div class = "row">
  <div class = "six columns" style="vertical-align: top;">
    <span>
    <label for="card-number">Card Number</label>
    <center>
    <div id="card-number" class="hosted-field"></div>
    </center>
    </span>
 </div>
  <div class = "six columns">
    <label for="cvv">CVV</label>
    <center>
    <div id="cvv" class="hosted-field"></div>
    </center>
</div>
</div>

<div class = "row">
  <div class = "six columns" style="vertical-align: top;">
    <label for="expiration-date">Expiration Date</label>
    <center>
    <div id="expiration-date" class="hosted-field"></div>
    </center>
  </div>
  <div class = "six columns">
    <label for="expiration-date">Postal Code</label>
    <center>
    <div id="postal-code" class="hosted-field"></div>
    </center>
</div>

<div class = "row">
  <div class = "six columns" style="vertical-align: top;">
    <label for="firstname">First Name</label>
    <center>
    <div id="firstname" class="unhosted-field">
      <input type="text" id="txtfirstname" placeholder="First Name">
    </div>
    </center>
  </div>
  <div class = "six columns">
    <label for="Last Name">Last Name</label>
    <center>
    <div id="lastname" class="unhosted-field">
      <input type="text" id="txtlastname" placeholder="Last Name">
    </div>
    </center>
</div>

<div class = "row">
  <div class = "six columns" style="vertical-align: top;">
    <label for="streetaddress">Street Address</label>
    <center>
    <div id="streetaddress" class="unhosted-field">
      <input type="text" id="txtstreetaddress" placeholder="Street Address">
    </div>
    </center>
  </div>
  <div class = "six columns">
    <label for="extendedstreetaddress">Extended Street Address</label>
    <center>
    <div id="extendedstreetaddress" class="unhosted-field">
      <input type="text" id="txtextendedaddress" placeholder="Extended Street Address">
    </div>
    </center>
</div>

<div class = "row">
  <div class = "six columns" style="vertical-align: top;">
    <label for="cityname">City Name</label>
    <center>
    <div id="cityname" class="unhosted-field">
      <input type="text" id="txtcityname" placeholder="City Name">
    </div>
    </center>
  </div>
  <div class = "six columns">
    <label for="statecodefield">State Abbreviation</label>
    <center>
    <div id="statecodefield" class="unhosted-field">
      <input type="text" id="txtstatecidefield" placeholder="Enter State Code">
    </div>
    </center>
</div>

<div class = "row">
  <div class = "six columns" style="vertical-align: top;">
    <label for="zipcode">Zip Code</label>
    <center>
    <div id="zipcode" class="unhosted-field">
      <input type="text" id="txtzipcode" placeholder="Zip Code">
    </div>
    </center>
  </div>
  <div class = "six columns">
    <label for="countrycode">Country code</label>
    <center>
    <div id="countrycode" class="unhosted-field">
      <input type="text" id="txtcountrycode" placeholder="Enter Country Code">
    </div>
    </center>
</div>

<div class = "row">
  <div class = "six columns" style="vertical-align: top;">
    <label for="companycode">Company Name</label>
    <center>
    <div id="companycode" class="unhosted-field">
      <input type="text" id="txtcompanyname" placeholder="Enter Company Name">
    </div>
    </center>
  </div>
  <div class = "six columns">
    <label for="phone">Phone</label>
    <center>
    <div id="phone" class="unhosted-field">
      <input type="text" id="txtphone" placeholder="Enter phone number">
    </div>
    </center>
</div>

<div class = "row">
  <div class = "six columns" style="vertical-align: top;">
    <label for="fax">Fax</label>
    <center>
    <div id="fax" class="unhosted-field">
      <input type="text" id="txtfax" placeholder="Enter fax number">
    </div>
    </center>
  </div>
  <div class = "six columns">
    <label for="email">Email</label>
    <center>
    <div id="phone" class="unhosted-field">
      <input type="text" id="txtemail" placeholder="Enter email address">
    </div>
    </center>
</div>


<div class = "row">
  <div class = "six columns" style="vertical-align: top;">
    <label for="website">Website</label>
    <center>
    <div id="website" class="unhosted-field">
      <input type="text" id="txtwebsite" placeholder="Enter website">
    </div>
    </center>
  </div>
  <div class = "six columns">
    <label for="cardholdername">Card Holder Name</label>
    <center>
    <div id="cardholdername" class="unhosted-field">
      <input type="text" id="txtcardholdername" placeholder="Enter Card Holder Name">
    </div>
    </center>
</div>

<div class = "row">
  <div class = "six columns" style="vertical-align: top;">
    <label for="website">Amount</label>
    <center>
    <div id="website" class="unhosted-field">
      <input type="text" id="txtamount" placeholder="15.00">
    </div>
    </center>
  </div>
</div>

<div class = "row">
<button class="btn-1">Submit</button>
</div>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="BraintreeSale.js"></script>
<script src="https://js.braintreegateway.com/web/3.26.0/js/client.min.js"></script>
<script src="https://js.braintreegateway.com/web/3.26.0/js/hosted-fields.min.js"></script>