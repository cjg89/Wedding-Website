<?php 
 // this starts the session 
 include ("Database.php");
 require_once('../soapclient/SforceEnterpriseClient.php');
 
 	function ajaxCall($code, $attendees, $comments, $allergies, $type) {
		 //If an update has been posted to the page, try and update the record
		 if(isset($type)) {
			 if($type == 'reservation') {
				 //Call the delete record function
				 return getReservations($code);
			 } else if ($type == 'attendees') {
				 return updateAllergies($attendees, $comments, $allergies);
			 }
		}
	}
	
	function getReservations($code) {
		
		//For when the user is deleteing a reservation
		//Create a new database connection
		$mySforceconnection = Database::login();
		
		 try {
			$query = "Select ID FROM Group__c WHERE Name = '" . addslashes($code) . "'";
			
			$results = $mySforceconnection->query(($query));
			$records = $results->records;
			
			$id = $records[0]->Id;
			 
			 //Query String for All Menu Items		
			$query = "Select ID, Name FROM Attendee__c WHERE Group__c = '" . $id . "'";
			
			//Query the database
			$results = $mySforceconnection->query(($query));
			$records = $results->records;
			
			//Query until all records are queried
			while($results->done == false) {
				
				$results = $mySforceconnection->querymore($response->queryLocator);	
				array_push($records, $results->records);
				
			}
			
			//Logout of the database
			Database::logout($mySforceconnection);
			
			if(sizeof($records) > 0) {
				return json_encode($records);
			}
			
			//Put the results in an array and return the array
			return "Sorry, this code doesn't match any guests on our guest list. Please try again.";
			 
		 } catch(Exception $e) {
			 $error = $e->getMessage();
			 Database::logout($mySforceconnection);
			 return $e->getMessage();
		 }	 
	
	}
	
	function updateAllergies($attendees, $comments, $allergies) {
		//For when the user is deleteing a reservation
		
	}
	
	echo ajaxCall(trim($_REQUEST['code']), trim($_REQUEST['attendees']), trim($_REQUEST['comments']), trim($_REQUEST['allergies']), trim($_REQUEST['type']));

?>