<?php

// Internet Speed Upload/Download


// header voucher
$headerv="tukang wipi";
// note voucher
$notev="Login dan Logout";


	function GUID()
	{
		if (function_exists('com_create_guid') === true)
		{
			return trim(com_create_guid(), '{}');
		}

		return strtolower(sprintf('%04X%04X%04X%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535)));
	}
	
	
	function pathweb()
	{
		$path = strtolower(str_replace('/', '', $_SERVER['REQUEST_URI']));
		return $path;
	}


	function readJson($filedt) 
	{
   	
		$myFile = $_SERVER['DOCUMENT_ROOT']."/data/".$filedt.".json";
		$arr_data = array(); // create empty array
	 
	   try
	   {
			//Get form data
			/*$formdata = array(
			   'firstName'=> 'aa',
			   'lastName'=> 'lastName',
			   'email'=> 'email',
			   'mobile'=> 'mobile'
			);
			*/
			//Get data from existing json file
			$jsondata = file_get_contents($myFile);
	 
			// converts json data into array
			$arr_data = json_decode($jsondata, true);
	 
			// Push user data to array
			//array_push($arr_data,$formdata);				
				
	 
			//Convert updated array to JSON
			//$jsondata = json_encode($formdata, JSON_PRETTY_PRINT);
			
			//write json data into data.json file
			/*if(file_put_contents($myFile, $jsondata)) {
				echo '<script>console.log("Data successfully saved");</script>';
				echo '<script>console.log('.$jsondata.');</script>';
			}
			else 
			echo '<script>console.log("error");</script>';
			*/
			//echo '<script>console.log("error '.$filedt.'")</script>';
			if($jsondata !=''){
				
				echo '<script>var '.$filedt.'='.$jsondata.';</script>';				
			}else{
				echo '<script>console.log("error '.$filedt.' '.$jsondata.'")</script>';
				
			}
			

		}
		catch (Exception $e) {
				 echo 'Caught exception: ',  $e->getMessage(), "\n";
		};
	}
?>