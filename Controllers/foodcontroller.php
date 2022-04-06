<?php
namespace Controllers;

use Services\RestaurantService;

class FoodController extends Controller{
        
    private $restaurantService;
    function __construct()
    {
        $this->restaurantService = new RestaurantService();
    }
    function index(){
        $model = $this->restaurantService->getAll();
        echo $this->displayView($model);
    }
}