<?php
/**	
* CityMapper
*
* This class is in charge of access database and
* interact with it in order to persist data
*
* @link http://github.com/wellingtonbraga/php_postis_car_finder/app/models/dataMapper/cityMapper.php
* @copyright Copyright (c) 2016
* @author Wellington Braga <wellington.braga.inatel@gmail.com>
* @license MIT License
*/
require_once 'app/models/city.php';

Class CityMapper
{
 	/**
	* Pdo instance
	*
	* @var PDO
	*/     
    private $db;

	/**
	* Constructor
	*
	* Request a database connection
	*
	* @return void
	*/	
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

	/**
	* listCities
	*
	* List all cities registered in database
	*
	* @return array of Cars
	*/
    public function listCities()
    {
        // define sql to be executed
        $sql = "SELECT c.id, c.city_name, ST_AsText(c.geom) as geom FROM cities c";
        
        // preparing sql for execution
        $query = $this->db->prepare($sql);

        // execute query
        $query->execute();
        
        // return array of cities
        return $query->fetchAll(PDO::FETCH_CLASS, "City");
    }

	/**
	* getCityById
	*
	* Retrieve the city by id
	*
    * @param int $id id of the city
    *
	* @return City
	*/
    public function getCityById($id)
    {
        // define sql to be executed
        $sql = "SELECT * FROM cities WHERE id = :id LIMIT 1";
        
        // preparing sql for execution
        $query = $this->db->prepare($sql);
        
        // binding param id
        $query->bindParam("id", $id);
        
        // execute query
        $query->execute();
        
        // define fetch mode
        $query->setFetchMode(PDO::FETCH_CLASS, "City");
        
        // return City object
        return $query->fetch();
    }

	/**
	* getCityByName
	*
	* Retrieve the city by name
	*
    * @param String $name name of the city
    *
	* @return City
	*/
    public function getCityByName($name)
    {
        // define sql to be executed
        $sql = "SELECT c.id, c.city_name, ST_AsText(c.geom) as geom FROM cities c WHERE city_name = '$name'";
        
        // preparing sql for execution
        $query = $this->db->prepare($sql);

        // execute query
        $query->execute();
        
        // define fetch mode
        $query->setFetchMode(PDO::FETCH_CLASS, "City");
        
        // return City object
        return $query->fetch();
    }

}