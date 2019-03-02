<?php 
error_reporting(0); 
class calculator
{ 
	function __call($name_of_operation, $arguments)
	{
	
		switch	($name_of_operation) {
			case 'sum':
				$arg = explode(',',$arguments[0]);
				$message = '';
				if (count($arg) > 2) {
					$message = 'Please enter only two numbers.';
					return $message;
				}
				if (!empty($arg)) {
					$sum_of_numbers = array_sum($arg);
					return $sum_of_numbers;	
				} else {
					return 0;
				}
			case 'add':
				$parameter = $arguments[0];
				if ($parameter == '') {
					return 0;
				}
				$parameter = str_replace(";",",",$parameter);
				$parameter = str_replace("\\",",",$parameter);
				$parameter = str_replace("n",",",$parameter);
				$arg = explode(',',$parameter);
				
				foreach ($arg as $num) {
					// check negative number
					if ($num < 0) {
						$negativeNumber[] = $num;
					}
					if ($num <= 1000) {
						$num_arr[] = $num;
					}
				}
				
				if (!empty($negativeNumber)) {
					return 'Negative numbers ('.implode(',',$negativeNumber).') not allowed.';
				}
				
				$add_of_numbers = array_sum($num_arr);
				return $add_of_numbers;	
				
				default:
					return 'Invalid Entry';
		}
	}
}

try
{
	$operation = $argv[1];
	$values = $argv[2];
	if (!$operation) {
		 throw new Exception('Invalid Entry.');
	}
}
catch (Exception $e)
{
    echo 'Caught exception: ',  $e->getMessage(), "\n";
	exit;
}
$cal = new calculator;
echo($cal->$operation($values));

?> 
