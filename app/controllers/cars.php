<?php

Class Cars extends Controller
{
    
    protected $city;

    protected $cars;

    public function __construct($db)
    {
        $this->city = parent::model("city", $db);
        $this->cars = parent::model("car", $db);
    }	


    public function index($cityName = null, $radius = null)
    {
		$data["title"] = "List Cars from City Radius" ;
		
		if(!is_null($cityName) && !is_null($radius)){
			$cityName = str_replace("_"," ", $cityName);
			$data["radius"] = $radius;
			$data["city"] = $cityName;
			$data["cars"] = $this->cars->getCarsByCityRadius($cityName, $radius, $this->city->getCityByName($cityName)->getGeom());
			
			$data["title"] .= " " .str_replace("_"," ", $cityName);
		}
		
		if(isset($_POST["city"]) && isset($_POST["radius"])){
			$cityName = str_replace("_"," ", $_POST["city"]);
			$data["radius"] = $_POST["radius"];
			$data["city"] = $cityName;
			$data["cars"] = $this->cars->getCarsByCityRadius($cityName, $_POST["radius"], $this->city->getCityByName($cityName)->getGeom());
			
			$data["title"] .= " " .str_replace("_"," ", $cityName);			
		}

		parent::view("cars/carFromCityRadius", $data);

    }

	public function searchByCityRadius()
	{
		$data["title"] = "Search By City Radius";
		
		$data["cities"] = $this->city->listCities();
		
		parent::view("cars/searchByCityRadius", $data);
	}

	public function searchByCityRadiusAndModel()
	{
		$data["title"] = "Search By City Radius and Model";
		
		$data["cities"] = $this->city->listCities();
		
		parent::view("cars/searchByCityRadiusAndModel", $data);
	}

	public function getCarsByCityRadiusAndModel()
    {		
		$data["title"] = "Find Cars by City Radius and Model";
		
		$data["radius"] = $_POST["radius"];
		$data["city"] = str_replace("_"," ", $_POST["city"]);			
		$model = $_POST["model"];
		
		$data["cars"] = $this->cars->getCarsByCityRadiusAndModel($data["city"], $data["radius"], $model);
	
		parent::view("cars/car", $data);
    }
    
	public function searchCheapestCarByRadius(){
		$data["title"] = "Find Cheapest Car by City Radius";

		$data["cities"] = $this->city->listCities();
		
		parent::view("cars/searchCheapestCarByCityRadius", $data);
				
	}
	
	public function getCheapestCarByCityRadiusAndModel()
    {
		$data["title"] = "Find Cheapest Car by City Radius";
		
		$data["radius"] = $_POST["radius"];
    	$data["city"] = str_replace("_"," ", $_POST["city"]);	
		
		$data["cars"] = $this->cars->getCheapestCarByCityRadiusAndModel($data["city"], $data["radius"]);
	
		parent::view("cars/car", $data);

    }
    
}