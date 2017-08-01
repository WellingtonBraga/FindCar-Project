<?php
/**	
* CartMapper
*
* This class is in charge of access database and
* interact with it in order to persist data
*
* @link http://github.com/wellingtonbraga/php_postis_car_finder/app/models/dataMapper/carMapper.php
* @copyright Copyright (c) 2016
* @author Wellington Braga <wellington.braga.inatel@gmail.com>
* @license MIT License
*/

require_once 'app/models/car.php';
require_once 'app/models/city.php';

Class CarMapper
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
    public function __construct($db)
    {
		// Receive the instance of database
        $this->db = Database::getInstance();
    }

	/**
	* listCars
	*
	* List all cars registered in database
	*
	* @return array of Cars
	*/
    public function listCars()
    {
		// define sql to be executed
        $sql = "SELECT c.id, c.car, c.price, ct.city_name as city from cars c JOIN cities ct ON c.city_id = ct.id";
		
		// preparing sql for execution
        $query = $this->db->prepare($sql);
		
		// execute query
        $query->execute();
		
		// return all results
        return  $query->fetchAll(PDO::FETCH_CLASS, "Cars");

    }

	/**
	* getCarsByCityRadius
	*
	* List all cars registered in database based on radius informed
	* by params
	*
	* @param String|String $cityName city defined by user 
	* @param String|String $radius radius informed in order to realize the search
	* @geom Geograph|Point $geom coordenates of the current user city
	*
	* @return array of Cars
	*/
    public function getCarsByCityRadius($cityName, $radius, $geom)
    {
		// define sql to be executed
    	$sql = "
	    	SELECT c.car, ct.city_name, c.price, ST_Distance_Sphere(:geom, ST_AsText(ct.geom)) / 1000 as 
	    	distance from cars c JOIN cities ct ON c.city_id = ct.id WHERE ct.city_name != :city AND 
	    	ST_Distance_Sphere(:geom, ST_AsText(ct.geom)) / 1000 < :radius
			ORDER BY c.price
		";
		
		// preparing sql for execution
		$query = $this->db->prepare($sql);
		
		// bind param geom
		$query->bindParam('geom', $geom);
		// bind param city
		$query->bindParam('city', $cityName);
		// bind param radius
		$query->bindParam('radius', $radius);

		// execute query
        $query->execute();
		
		// retun all results
        return  $query->fetchAll(PDO::FETCH_CLASS, "Cars");		
    }

	/**
	* getCarsByCityRadiusAndModel
	*
	* List all cars registered in database based on radius 
	* and model informed by params
	*
	* @param String|String $cityName city defined by user 
	* @param String|String $radius radius informed in order to realize the search
	* @param String|String $model name of the car to be searched
	*
	* @return array of Cars
	*/
    public function getCarsByCityRadiusAndModel($name, $radius, $model)
    {
		// Retrieving the geom of city informed by user
    	$city = new City();
    	$geom = $city->getCityByName($name)->getGeom();
		
		// define sql to be executed
    	$sql  = "
	    	SELECT c.car, ct.city_name, c.price, ST_Distance_Sphere(:geom, ST_AsText(ct.geom)) / 1000 as distance
	    	FROM cars c JOIN cities ct ON c.city_id = ct.id WHERE ct.city_name != :city AND
	    	ST_Distance_Sphere(:geom, ST_AsText(ct.geom)) / 1000 < :radius AND c.car = :car 
			ORDER BY c.price, ST_Distance_Sphere(:geom, ST_AsText(ct.geom)) / 1000
		";
		
		// preparing query to be executed
		$query = $this->db->prepare($sql);
		
		// bind  param geom
		$query->bindParam('geom', $geom);
		// bind  param city
		$query->bindParam('city', $name);
		// bind  param car
		$query->bindParam('car', $model);
		// bind  param radius
		$query->bindParam('radius', $radius);

		// execute query
        $query->execute();		
		
		// return Cars object
        return  $query->fetchAll(PDO::FETCH_CLASS, "Cars");		
    }

	/**
	* getCheapestCarByCityRadiusAndModel
	*
	* Retrive the cheapest car inside tha radius informed by the user
	*
	* @param String|String $cityName city defined by user 
	* @param String|String $radius radius informed in order to realize the search
	* @param String|String $model name of the car to be searched
	*
	* @return Cars|cars object
	*/
    public function getCheapestCarByCityRadiusAndModel($name, $radius, $model = null)
    {
		// Retrieving the geom of city informed by user
    	$city = new City();
    	$geom = $city->getCityByName($name)->getGeom();
		
		// sql to be executed
    	$sql  = "
	    	SELECT c.car, ct.city_name, c.price, ST_Distance_Sphere(:geom, ST_AsText(ct.geom)) / 1000 as distance
	    	FROM cars c JOIN cities ct ON c.city_id = ct.id WHERE ct.city_name != :city AND
	    	ST_Distance_Sphere(:geom, ST_AsText(ct.geom)) / 1000 < :radius";
		
		// if model is not null, we add it in the sql
		if (!is_null($model)) $sql .= "AND c.car = :car ";
		
		// continuing query
		$sql .="  
			ORDER BY c.price, ST_Distance_Sphere(:geom, ST_AsText(ct.geom)) / 1000
			Limit 1;
		";
		
		// preparing query to be executed
		$query = $this->db->prepare($sql);

		// bind  param geom
		$query->bindParam('geom', $geom);
		// bind  param city
		$query->bindParam('city', $name);
		// bind  param radius
		$query->bindParam('radius', $radius);
		
		// if model is not null, we bind param car using variable model
		if(!is_null($model)) $query->bindParam('car', $model);
		
		// execute query
        $query->execute();
		
		// Return array cars
        return  $query->fetchAll(PDO::FETCH_CLASS, "Cars");		
    }

	/**
	* listCarsByCityId
	*
	* Retrive all cars of a determined city
	*
	* @param String|String $city city defined by user 
	*
	* @return Array of Cars
	*/	
	public function listCarsByCityId($city)
	{
		// define sql to be executed	
    	$sql  = "
	    	SELECT c.car, ct.city_name, c.price, ST_AsText(ct.geom) as distance
	    	FROM cars c JOIN cities ct ON c.city_id = ct.id WHERE ct.id = :city
			ORDER BY c.price
		";
		
		// preparing sql for execution
		$query = $this->db->prepare($sql);
		
		// binding param city
		$query->bindParam('city', $city);
		
		// execute query
        $query->execute();
		
		//return  array cars
        return  $query->fetchAll(PDO::FETCH_CLASS, "Car");		
	}

}