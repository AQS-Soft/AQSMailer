# AQSMailer
Modified PHPMailer to use the easiest way with core PHP and any other PHP framework


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
