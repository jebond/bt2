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
<link rel="stylesheet" href="skeleton.css"
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
<button>Submit</button>
</div>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="BraintreeSale.js"></script>
<script src="https://js.braintreegateway.com/web/3.26.0/js/client.min.js"></script>
<script src="https://js.braintreegateway.com/web/3.26.0/js/hosted-fields.min.js"></script>