<?php 

//Call the Enterprise PHP library
include('Constants.php');

//Class for logging into and access the database
class Database {
	
	//Static login variables
	private static $USERNAME;
	private static $PASSWORD;
	private static $SECURITY_TOKEN;
	
	public static function login() {
	
		$USERNAME = Constant::getUsername();
		$PASSWORD = Constant::getPassword();
		$SECURITY_TOKEN = Constant::getToken();
		
		//Connect and login to the database
		$mySforceConnection = new SforceEnterpriseClient();
		$mySforceConnection->createConnection('../enterprise.wsdl.xml');
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