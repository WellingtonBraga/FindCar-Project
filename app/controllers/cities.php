<?php

Class Cities extends Controller{

    protected $city;

    protected $car;

    public function __construct()
    {
        $this->city = parent::model("city");
        $this->car = parent::model("car");
    }

    public function index(){
        $data["title"] = "List of Cities";
        
        $data["cities"] = $this->city->listCities();

        parent::view("cities/index", $data);

    }
    
    public function listCars($city = null){
        $data["city"] = $this->city->getCityByName(str_replace("_"," ", $city));
        
        $data["title"] = "List of cars in the city of " .str_replace("_"," ", $city);
        
        $data["cars"] = $this->car->listCarsByCityId($data["city"]->getId());    
        
        parent::view("cities/city_car", $data);

    }
}