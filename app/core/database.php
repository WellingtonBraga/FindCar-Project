<?php
/**	
* Database
*
* This class is in charge to open the connection to database and
* return an object of PDO. In this class, it is used the Singleton Pattern
*
* @link http://github.com/wellingtonbraga/php_postis_car_finder/app/core/database.php
* @copyright Copyright (c) 2016
* @author Wellington Braga <wellington.braga.inatel@gmail.com>
* @license MIT License
*/
Class Database
{
    /**
	* pdo
	*
	* PDO object which is returned after the execution of method getInstance
    *
	* @default null
	* @return int
	*/
    protected static $pdo = null;
    
 	/**
	* __construct
	*
	* The constructor method is private in order to avoid a the use of new
    * keyword to instantiate a new object
	*
    * @see Singleton Design Pattern
	* @return void
	*/
    private function __construct(){}

	/**
	* getInstance
	*
	* This method check if pdo attribute is null, if so, this method will
    * instantiate a new object of pdo, otherwise, the method will return
    * the object previously instantiated.
	*
    * @see Singleton Design Pattern
	* @return int
	*/
    public static function getInstance()
    {
        // if $pdo is null, instantiate a new object
        if (is_null(static::$pdo)) {
	        static::$pdo = new PDO("pgsql:dbname=exemplo_espacial;host=localhost;port=5432","postgres","1234");
	        static::$pdo->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
        }
        
        // return pdo object
        return static::$pdo;
    }
 
  	/**
	* __clone
	*
	* The clone method throws an exception in order to avoid clone
	*
    * @see Singleton Design Pattern
	* @return void
	*/   
    final public function __clone()
    {
        throw new SingletonPatternCloneException('This class is a singleton. Can not be cloned.');
    }

  	/**
	* __wakeup
	*
	* The wakeup method throws an exception in order to avoid unserialize
	*
    * @see Singleton Design Pattern
	* @return void
	*/   
    final public function __wakeup()
    {
        throw new SingletonPatternWakeupException('This class is a singleton. Can not be waked up.');
    }

}