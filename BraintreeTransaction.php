<?php
require_once '/var/www/zeta.trollandtoad.com/vendor/braintree/braintree_php/lib/Braintree.php';
Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('gx7yfcfb8k4rnxzr');
Braintree_Configuration::publicKey('m2f9dj3m7fd9wb6m');
Braintree_Configuration::privateKey('862195f02b6731dccb8762baf1bb9ee8');

$data = file_get_contents("php://input");
$dataarray = json_decode($data);

if($dataarray->method === 'sale') {
DoBasicSale(
	$dataarray->nonce,
	$dataarray->amount,
	$dataarray->customerID,
	$dataarray->firstname,
	$dataarray->lastname,
	$dataarray->streetaddress,
	$dataarray->extaddress,
	$dataarray->locality,
	$dataarray->region,
	$dataarray->postalcode,
	$dataarray->countrycode,
	$dataarray->company,
	$dataarray->phone,
	$dataarray->fax,
	$dataarray->email,
	$dataarray->website,
	$dataarray->cardholdername
);
	$customerid = 'id.txt';
	$handle = fopen($customerid, 'a') or die('Cannot open file:  '.$customerid);
	$data = $dataarray->customerID;
	fwrite($handle, $data."\r\n");
	fclose($handle);
}
else if($dataarray->method === 'userlookup') {
DoCustomerUpdate(
	$dataarray->customerID,
	$dataarray->firstname,
	$dataarray->lastname,
	$dataarray->company,
	$dataarray->email,
	$dataarray->phone,
	$dataarray->fax,
	$dataarray->website
);
}
else if ($dataarray->method === 'getuserinfo') {
GetCustomerInformation(
	$dataarray->customerID
);	
}
         
function DoBasicSale($nonce,$amount,$customerid,$firstname,$lastname,$streetaddress,$extaddress,$locality,$region,$postalcode,$country,$company,$phone,$fax,$email,$website,$cardholdername){
    $result = Braintree_Transaction::sale([
          'amount' => $amount,
          'paymentMethodNonce' => $nonce,
          'customer' => [
          	'id' => $customerid,
          	'firstName' => $firstname,
          	'lastName'  => $lastname,
          	'company' => $company,
          	'phone' => $phone,
          	'fax' => $fax,
          	'website' => $website,
          	'email' => $email
          ],
          'billing' => [
          	'firstName' => $firstname,
          	'lastName'  => $lastname,
          	'company' => $company,
          	'streetAddress' => $streetaddress,
          	'extendedAddress' => $extaddress,
          	'locality' => $locality,
          	'region' => $region,
          	'postalCode' => $postalcode,
          	'countryCodeAlpha2' => $country
          ],
          'shipping' => [
          	'firstName' => $firstname,
    		'lastName' => $lastname,
    		'company' => $company,
    		'streetAddress' => $streetaddress,
    		'extendedAddress' => $extaddress,
    		'locality' => $locality,
    		'region' => $region,
    		'postalCode' => $postalcode,
    		'countryCodeAlpha2' => $country
          ],
          'options' => [
          'submitForSettlement' => True,
          'storeInVaultOnSuccess' => True
          ]]);

          if($result->success) {
            echo("Transaction communication was a success. Transaction was " . $result->transaction->status);
          }
          else
          {
            echo("We Failed ");
            foreach($result->errors->deepAll() AS $error) {
    			echo($error->attribute . ": " . $error->code . " " . $error->message . "\n");
		 }
      }    	
	}
	
	function DoCustomerUpdate($customerid,$firstname,$lastname,$company,$email,$phone,$fax,$website) {
		$updateResult = Braintree_Customer::update(
			$customerid,
			[
			  'firstName' => $firstname,
			  'lastName' => $lastname,
			  'company' => $company,
			  'email' => $email,
			  'phone' => $phone,
			  'fax' => $fax,
			  'website' => $website
			]
		);
		
		if($updateResult->success === true) {
			echo "Update successful";
		}
		else {
			echo "Update failed";
		}
	}

	function GetCustomerInformation($customerid) {
		$collection = Braintree_Customer::search([
			Braintree_CustomerSearch::id()->is($customerid)
		]);
		
		foreach($collection as $customer) {
			$customerjson = json_encode($customer);
			
			echo "Id: ".$customer->id."</br>";
			echo "First Name: ".$customer->firstName."</br>";
			echo "Last Name: ".$customer->lastName."</br>";
			echo "Company Name: ".$customer->company."</br>";
			echo "email: ".$customer->email."</br>";
			echo "Phone Code: ".$customer->phone."</br>";
			echo "Fax Number: ".$customer->fax."</br>";
			echo "Website: ".$customer->website."</br>";
			echo "Card Number: ".$customer->creditCards->maskedNumber."</br>";
			echo "Expiration Month: ".$customer->creditCards->expirationMonth."</br>";
			echo "Expiration Month: ".$customer->creditCards->expirationYear."</br>";
	}
}
?>