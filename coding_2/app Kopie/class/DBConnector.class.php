<?php
class DBConnector {
	
	/** @var PDO */
	private $dbh;
	
	static private $DBC = null;
	
	private function __construct(){
		$this->dbh = new PDO('mysql:host=localhost;dbname=recruitment', 'recruitment', 'aASDdjcn74YA1!asdkmAASDmk',  array(
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			));
	}

	/**
	* Use this static method to get a singleton instance
	*
	* @return DBConnector
	*/
	static function get()
	{
		//Create instance of singleton class
		if(!DBConnector::$DBC){
			DBConnector::$DBC = new DBConnector(); //Reference is stored in static var $xf
		}
		return DBConnector::$DBC;
	}
	
	public function query($q){
		return $this->dbh->query($q,PDO::FETCH_ASSOC);
	}
	
	public function exec($q){
		return $this->dbh->exec($q);
	}

	/**
	 * Escape/Quote String
	 *
	 * @param mixed $string
	 *
	 * @return string
	 */
	public function escape($string){
		return $this->dbh->quote($string);
	}
}