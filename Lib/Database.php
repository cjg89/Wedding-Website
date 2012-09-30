<?php 

//Call the Enterprise PHP library
require_once ('soapclient/SforceEnterpriseClient.php');
include('lib/Constants.php');

//Class for logging into and access the database
class Database {
	
	//Static login variables
	private static $USERNAME = Const->$USERNAME;
	private static $PASSWORD = Const->$PASSWORD;
	private static $SECURITY_TOKEN = Const->$SECURITY_TOKEN;
	
	public static function login() {
		
		//Connect and login to the database
		$mySforceConnection = new SforceEnterpriseClient();
		$mySforceConnection->createConnection('enterprise.wsdl.xml');
		$mySforceConnection->login(self::$USERNAME, self::$PASSWORD.self::$SECURITY_TOKEN);
		
		//Return the connection for use
		return $mySforceConnection;
		
	}
	
	public static function logout($mySforceConnection) {
		
		//Logout of the connection to the database
		$response = $mySforceConnection->logout();
	
		return $response;	
	}
	
	
	
}

?>