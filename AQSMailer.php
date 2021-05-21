<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
 * AQSMailer - PHP email creation and transport class.
 * PHP Version 5.5
 * @package AQSMailer
 * @see https://github.com/AQS-Soft/AQSMailer The AQSMailer GitHub project
 * @author AQ shah <aqshah@aqssoft.com>
 * @copyright 2021 aqshah
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * @note Modified PHPMailer to use the easiest way with core PHP and any 
 * other PHP framework.
 */


class AQSMailer{
    use LoadView;
    /**
    * @var debug
    */
    private $debug;

    /**
    * @var auth
    */
    private $auth;

    /**
    * @var protocol
    */
    private $protocol;

    /**
    * @var port
    */
    private $port;

    /**
    * @var isHTML
    */
    private $isHTML;

    /**
    * @var senderName
    */
    private $senderName;

    /**
    * @var senderEmail
    */
    private $senderEmail;

    /**
    * @var password
    */
    private $password;

    /**
    * @var SMTPhost
    */
    private $SMTPhost;

    /**
    * @var subject
    */
    private $subject;

    /**
    * @var body
    */
    private $body;

    /**
    * @var view file path string html php
    */
    private $view;

    /**
    * @var teplyTo email address and name optinal
    */
    private $replyTo;


    /**
    * @var cc receiver email address 
    */
    private $cc;

     /**
    * @var bcc receiver email address 
    */
    private $bcc;

     /**
    * @var attach file path with extension
    */
    private $attach;

    
    /**
    * initialize class
    */
    public function __construct()
    {
        require_once "vendor/autoload.php";
        require('config_.php');
        $this->senderName = senderName;
        $this->senderEmail = from;
        $this->password = password;
        $this->SMTPhost = smtphost;
        $this->auth = auth;
        $this->protocol = protocol;
        $this->port = port;
        $this->isHTML = isHTML;

    }

    /**
     * set data
     * 
     * @param sender Name string text
     * 
     */
    public function senderName( $senderName = null ){
        $this->senderName = $senderName;return $this;
    }

   
   /**
    * @var path and data
    * path var gets file location as string with .php extension
    * data var gets array with values 
    */
    Public function view( $path = null , array $data){
        $contents = file_get_contents($path.'.php');
        foreach($data as $key => $value)
        {
            $contents = str_replace('{{ '.$key.' }}', $value, $contents);
        }
        $this->body = $contents;return $this;
    }


    /**
     * set data
     * 
     * @param body string text
     * html PDF rich text
     */
    public function body( $body = null ){
        $this->body = $body;return $this;
    }

    /**
     * set data
     * 
     * @param replyTo email address
     */
    public function replyTo( $replyTo = null ){
        $this->replyTo = $replyTo;return $this;
    }

     /**
     * set data
     * 
     * @param cc receiver email address
     */
    public function cc( $cc = null ){
        $this->cc = $cc;return $this;
    }

     /**
     * set data
     * 
     * @param bcc receiver email address
     */
    public function bcc( $bcc = null ){
        $this->bcc = $bcc;return $this;
    }

      /**
     * set data
     * 
     * @param bcc receiver email address
     */
    public function attach( $attach = null ){
        $this->attach = $attach;return $this;
    }

    /**
     * set data
     * 
     * @param subject string text
     * 
     */
    public function subject( $subject = null ){
        $this->subject = $subject;return $this;
    }

   /**
     * set data
     * 
     * @param debug string text
     * 
     */
    public function debug( $debug = 0 ){
        $this->debug = $debug;return $this;
    }

   /**
     * set data
     * 
     * @param auth boolean
     * 
     */
    public function auth( $auth = true ){
        $this->auth = $auth;return $this;
    }

    /**
     * set data
     * 
     * @param protocol string text 
     * SSL or TLS
     */
    public function protocol( $protocol = 'tls' ){
        $this->protocol = $protocol;return $this;
    }

    /**
     * set data
     * 
     * @param port numeric 
     * 587 or 465
     */
    public function port( $port = 587 ){
        $this->port = $port;return $this;
    }
    
    /**
     * set data
     * 
     * @param isHTML boolean
     * 
     */
    public function isHTML( $isHTML = true ){
        $this->isHTML = $isHTML;return $this;
    }

   
    /**
     * Send email
     * 
     * @reciever string text
     * 
     */
    public function send( $reciever = null ){
        try {
            $mail = new PHPMailer;
            $mail->SMTPDebug = $this->debug;
            $mail->isSMTP();
            $mail->Host =  $this->SMTPhost;
            $mail->SMTPAuth = $this->auth;
            $mail->Username = $this->senderEmail;
            $mail->Password = $this->password;
            $mail->SMTPSecure = $this->protocol;
            $mail->Port = $this->port;
            $mail->setFrom($this->senderEmail, $this->senderName);
            $mail->addAddress($reciever);
            $mail->addReplyTo($this->replyTo);
            $mail->addCC($this->cc);
            $mail->addBCC($this->cc);
            $mail->addAttachment($this->attach); 
            $mail->isHTML($this->isHTML);
            $mail->Subject = $this->subject;
            $mail->Body    = $this->body;
            $mail->AltBody = $this->body;
            $mail->send();
            return true;
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}


Trait LoadView{

     /**
    * @var path and data
    * path var gets file location as string with .php extension
    * data var gets array with values 
    */
    Public function view( $path = null , array $data){

        $contents = file_get_contents($path);
        foreach($data as $key => $value)
        {
            $contents = str_replace('{{ '.$key.' }}', $value, $contents);
        }
        return $contents;
    }


}


?>
