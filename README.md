# AQSMailer
Modified PHPMailer to use the easiest way with core PHP and any other PHP framework


Example
 
	
    require 'AQSMailer.php';
    // set array
    $data['name'] = 'AQ Shah';
    $data['email'] = 'aqssoft.com';

    $mail = new AQSMailer();
    $mail->subject('Test Email')
    ->view('article', $data) /// load the view with acutal file path and pass array 
    ->cc('info@aqssoft.com')
    ->send('jqsystech@gmail.com');
