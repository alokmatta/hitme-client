<?php
	/* Send an SMS using Twilio. You can run this file 3 different ways:
	 *
	 * - Save it as sendnotifications.php and at the command line, run 
	 *        php sendnotifications.php
	 *
	 * - Upload it to a web host and load mywebhost.com/sendnotifications.php 
	 *   in a web browser.
	 * - Download a local server like WAMP, MAMP or XAMPP. Point the web root 
	 *   directory to the folder containing this file, and load 
	 *   localhost:8888/sendnotifications.php in a web browser.
	 */
	// Include the PHP Twilio library. You need to download the library from 
	// twilio.com/docs/libraries, and move it into the folder containing this 
	// file.
	ini_set('display_errors','On'); 

	require "Services/Twilio.php";
	
	// Set our AccountSid and AuthToken from twilio.com/user/account
	$AccountSid = "AC57796fd92efee51cb7dc8dc5bab60191";
	$AuthToken = "e86ed7c0d200cf3f5b093799499302a0";

	// Instantiate a new Twilio Rest Client
	$client = new Services_Twilio($AccountSid, $AuthToken);

	/* Your Twilio Number or Outgoing Caller ID */
	$from = '+441183100802';

	// make an associative array of server admins. Feel free to change/add your 
	// own phone number and name here.
	$people = array(
		"+447412924515" => "Kaushik",
		"+447814737977" => "Alok",
		);

	// Iterate over all admins in the $people array. $to is the phone number, 
	// $name is the user's name
	foreach ($people as $to => $name) {
		// Send a new outgoing SMS */
		$body = "Richard found an amazing tShirt for himself using HitMe!!!";
		$client->account->sms_messages->create($from, $to, $body);
		echo "Sent message to $name";
	}
?>
