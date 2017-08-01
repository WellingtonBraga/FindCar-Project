<?php
/**	
* Car
*
* This class is the entity for table cars of database
*
* @link http://github.com/wellingtonbraga/php_postis_car_finder/app/models/car.php
* @copyright Copyright (c) 2016
* @author Wellington Braga <wellington.braga.inatel@gmail.com>
* @license MIT License
*/
require_once 'app/models/dataMapper/carMapper.php';

Class Car extends CarMapper
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
	* car
	*
	* This var store the car name
	*
	* @var String
	*/
	private $car;

    /**
	* price
	*
	* This var store the car selling price
	*
	* @var float
	*/
	private $price;

    /**
	* city_name
	*
	* This var store the name of the city of the car
	*
	* @var String
	*/
	private $city_name;

    /**
	* distance
	*
	* This var store the distance of the car and the city defined by user
	*
	* @var float
	*/
	private $distance;

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
	* setCar
	*
	* define car name
	*
	* @return void
	*/
	public function setCar($car)
	{
		$this->car = $car;
	}

	/**
	* getCar
	*
	* return car name
	*
	* @return String
	*/
	public function getCar()
	{
		return $this->car;
	}

	/**
	* setPrice
	*
	* define car selling price
	*
	* @return void
	*/
	public function setPrice($price)
	{
		$this->price = $price;
	}

	/**
	* getPrice
	*
	* return car selling price
	*
	* @return float
	*/
	public function getPrice()
	{
		return $this->price;
	}

	/**
	* setCity
	*
	* define city where is the car.
	*
	* @return void
	*/
	public function setCity($city)
	{
		$this->city_name = $city;
	}	

	/**
	* getCity
	*
	* return city where is the car.
	*
	* @return int
	*/
	public function getCity()
	{
		return $this->city_name;
	}
	
	/**
	* setDistance
	*
	* define the distance between the city where is the car and the
	* city defined by the user.
	*
	* @return void
	*/	
	public function setDistance($distance)
	{
		$this->distance = $distance;
	}
	
	/**
	* setDistance
	*
	* return the distance between the city where is the car and the
	* city defined by the user.
	*
	* @return float
	*/
	public function getDistance()
	{
		return $this->distance;
	}

}