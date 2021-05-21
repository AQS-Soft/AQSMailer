# AQSMailer
Modified PHPMailer to use the easiest way with core PHP and any other PHP framework.
Usage 
1. clone this repo add in your project include "AQSMail.php" file then create an object and then use methods 
2. Install PHPMailer via composer using this command : composer require phpmailer/phpmailer and then copy AQSMailer.php file in this directory 

How to use AQSNailer 

Example
	
    require 'AQSMailer.php';
    // set array
    $data['name'] = 'AQ Shah';
    $data['email'] = 'aqssoft.com';

    $mail = new AQSMailer();
    $mail->subject('Test Email')
    ->view('article', $data) /// Load the view with the actual file path and pass an array
    ->cc('info@aqssoft.com')
    ->send('jqsystech@gmail.com');
