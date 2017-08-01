<?php
/**	
* City
*
* This class is the entity for table cities of database
*
* @link http://github.com/wellingtonbraga/php_postis_car_finder/app/models/city.php
* @copyright Copyright (c) 2016
* @author Wellington Braga <wellington.braga.inatel@gmail.com>
* @license MIT License
*/
require_once 'app/models/dataMapper/cityMapper.php';

Class City extends CityMapper
{
    /**
	* id
	*
	* This var store the car id
	*
	* @var int
	*/	
	private $id;

    /**
	* geom
	*
	* This var store the coordenates of the city
	*
	* @var Geograph POINT(x,y)
	*/
	private $geom;

    /**
	* city_name
	*
	* This var store the name of the city
	*
	* @var String
	*/
	private $city_name;

	/**
	* setId
	*
	* define car id
	*
	* @return void
	*/
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	* getId
	*
	* return car id
	*
	* @return int
	*/
	public function getId()
	{
		return $this->id;
	}

	/**
	* setGeom
	*
	* define geom of the City
	*
	* @return void
	*/
	public function setGeom($geom)
	{
		$this->geom = $geom;
	}

	/**
	* getGeom
	*
	* return geom of the City
	*
	* @return Geograph POINT(x,y)
	*/
	public function getGeom()
	{
		return $this->geom;
	}

	/**
	* setName
	*
	* define name of the City
	*
	* @return void
	*/
	public function setName($city_name)
	{
		$this->city_name = $city_name;
	}

	/**
	* getName
	*
	* return name of the City
	*
	* @return Strin
	*/
	public function getName()
	{
		return $this->city_name;
	}	
}