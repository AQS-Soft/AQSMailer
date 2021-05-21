<?php
namespace AQSMailer;

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