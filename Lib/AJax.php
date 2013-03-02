<?php 
 // this starts the session 
 include ("Database.php");
 include_once ("Constants.php");
 require_once('../soapclient/SforceEnterpriseClient.php');
 
 	function ajaxCall($code, $attendees, $comments, $allergies, $type) {
		 //If an update has been posted to the page, try and update the record
		 if(isset($type)) {
			 if($type == 'reservation') {
				 //Call the delete record function
				 return getReservations($code);
			 } else if ($type == 'attendees') {
				 return updateAllergies($code, $attendees, $comments, $allergies);
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
	
	function updateAllergies($code, $attendees, $comments, $allergies) {
		try {
			//return $attendees;
			$attendees = json_decode(stripslashes($attendees), true);
			//return print_r($attendees);
			
			//Build array to push to salesforce
			$updateArray = Array();
			
			foreach($attendees as $key =>$attendee) {
				//Define a standard object
				$attendeeUp = new stdClass();
				$attendeeUp->ID = $key;
				if($attendee == 'Yes') {
					$attendeeUp->RSVP__c = true;
				} else {
					$attendeeUp->RSVP__c = false;
				}
				
				array_push($updateArray, $attendeeUp);

			}
			
			$mySforceconnection = Database::login();
				
			$response = $mySforceconnection->update($updateArray, 'Attendee__c');
			
			$query = "Select ID FROM Group__c WHERE Name = '" . addslashes($code) . "'";
			
			$results = $mySforceconnection->query(($query));
			$records = $results->records;
			
			$id = $records[0]->Id;
			
			$group = new stdClass();
			$group->ID = $id;
			$group->Food_Allergies__c = $allergies;
			$group->Comments__c = $comments;
			
			//Build array to push to salesforce
			$updateArray = Array();
			
			array_push($updateArray, $group);
			
			$response2 = $mySforceconnection->update($updateArray, 'Group__c');
			
			//Logout of the database
			Database::logout($mySforceconnection);
			
			foreach($response2 as $response) {
				if(strcmp($response->success, '1') == 0) {
					
				} else {
					return "Failure";
				}
			}
			
			foreach($response as $res) {
				if(strcmp($response->success, '1') == 0) {
					
				} else {
					return "Failure";
				}
			}
			
			return "Success";
			
		} catch(Exception $e) {
			$error = $e->getMessage();
			//Logout of the database
			Database::logout($mySforceconnection);
			return $error;
		}
		
	}
	
	echo ajaxCall(trim($_REQUEST['code']), $_REQUEST['attendees'], trim($_REQUEST['comments']), trim($_REQUEST['allergies']), trim($_REQUEST['type']));

?>