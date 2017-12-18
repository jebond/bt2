<body>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="braintreetest.css" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="BraintreeUpdateCustomer.js"></script>
<div class="type-1">
  <div class="w3-container">
    <div class="w3-panel w3-blue w3-card-4">
    <h2>BrainTree Baby - Customer Info Update</h2>
    <a href="braintreetest.php" class="btn btn-1">
      <span class="txt">Back to Main</span>
      <span class="round"><i class="fa fa-chevron-right"></i></span>
    </a>
    <br>
  <br>
  </div>
 </div>
</div>
<br>
<div id="custresponse" style="display:none">test</div>
<form id="customerinfoupdate" method="POST" action="#">
<select id = "customerid1">
  <?php
  $handle = fopen("id.txt","r");
  if ($handle) {
    while(($line = fgets($handle)) !== false) {
      echo "<option value =" . $line . ">".$line."</option>";
    }
    fclose($handle);
  }
  else {
  }
  ?>
</select></br>
<input type="text" id="firstname" name="fn" placeholder="First Name"></br>
<input type="text" id="lastname" name="ln" placeholder="Last Name"></br>
<input type="text" id="company" name="cp" placeholder="Company"></br>
<input type="text" id="email" name="em" placeholder="Email"></br>
<input type="text" id="phone" name="pn" placeholder="Phone Number"></br>
<input type="text" id="fax"/ name="fnn" placeholder="Fax"></br>
<input type="text" id="website" name="ws" placeholder="Website"></br>
<button>Update Customer Info</button>
</form>
</body>