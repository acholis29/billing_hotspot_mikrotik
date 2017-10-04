<?php
class ClsConnection {
	public static $servername = "localhost";
	public static $username = "root";
	public static $password = "D1ptasoft";
	public static $database = "siakat";
}

class Database {
	private $_connection;
	private static $_instance; //The single instance
	private $_host = "localhost";
	private $_username = "root";
	private $_password = "D1ptasoft";
	private $_database = "siakat";
	/*
	Get an instance of the Database
	@return Instance
	*/
	public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	// Constructor
	private function __construct() {
		$this->_connection = new mysqli($this->_host, $this->_username, 
			$this->_password, $this->_database);
	
		// Error handling
		if(mysqli_connect_error()) {
			trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
				 E_USER_ERROR);
		}
	}
	// Magic method clone is empty to prevent duplication of connection
	private function __clone() { }
	// Get mysqli connection
	public function getConnection() {
		return $this->_connection;
	}
}

class Koneksi_mySQL{
        var $host;
        var $username;
        var $password;
        var $database;
        public $dbc;

        public function connect($set_host, $set_username, $set_password, $set_database)
        {
            $this->host = $set_host;
            $this->username = $set_username;
            $this->password = $set_password;
            $this->database = $set_database;

            $this->dbc = mysqli_connect($this->host, $this->username, $this->password,           $this->database) or die('Error connecting to DB');        
        }

        public function query($sql)
        {
            return mysqli_query($this->dbc, $sql) or die('Error querying the Database');
        }

		
		 public function fetch($result)
    {        
        return mysqli_fetch_array($result);
    }
	/*
        public function fetch($sql)
        {        
            $array = mysqli_fetch_array($this->query($sql));          
            return $array;
        }
*/
        public function close()
        {
            return mysqli_close($this->dbc);
        }
    }

?>