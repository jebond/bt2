<body>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="braintreetest.css" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="type-1">
  <div class="w3-container">
    <div class="w3-panel w3-blue w3-card-4">
    <h2>BrainTree Baby - Customer Info Lookup</h2>
    <a href="braintreetest.php" class="btn btn-1">
      <span class="txt">Back to Main</span>
      <span class="round"><i class="fa fa-chevron-right"></i></span>
    </a>
  	<br>
  <br>
  </div>
 </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="BraintreeGetCustomerInfo.js"></script>
<br>
<div id="custresponse" style="display:none">test</div>
<form id="customerinfo" method="POST" action="#">
<select id = "customerid1">
	<option value = "5973">5973</option>
	<option value = "1856">1856</option>
	<option value = "4271">4271</option>
	<option value = "2107">2107</option>
	<option value = "3455">3455</option>
	<option value = "7210">7210</option>
	<option value = "9578">9578</option>
	<option value = "2059">2059</option>
	<option value = "9669">9669</option>
	<option value = "7632">7632</option>
	<option value = "9812">9812</option>
	<option value = "6006">6006</option>
	<option value = "2714">2714</option>
	<option value = "2479">2479</option>
	<option value = "2626">2626</option>
	<option value = "6789">6789</option>
</select>
<button>Get Customer Info</button>
</form>
</body>