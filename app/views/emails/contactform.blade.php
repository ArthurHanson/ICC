<?php
//get the first name
$name = Input::get('name');
$phone = Input::get('phone');
$email = Input::get ('email');
$message = Input::get ('message');
$date_time = date("F j, Y, g:i a");
$userIpAddress = Request::getClientIp();
?> 

<h1>New Contact Form Submission</h1>

<p>
Last name: <?php echo($name);?><br />
Phone number: <?php echo($phone);?><br />
Email address: <?php echo ($email);?><br />
Message: <?php echo ($message);?><br />
Date: <?php echo($date_time);?><br />
User IP address: <?php echo($userIpAddress);?><br />

</p>