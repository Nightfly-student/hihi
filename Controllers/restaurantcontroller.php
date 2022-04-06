<?php
namespace Controllers;

use Services\RestaurantpageService;

class RestaurantController extends Controller{
        
    private $restaurantpageService;
    function __construct()
    {
        $this->restaurantpageService = new RestaurantpageService();
    }
    //gets restaurant info and sessions from the selected restaurant in the food event page //
    function index(){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $model = $this->restaurantpageService->getRestaurant($_POST['restaurant_id']);
        echo $this->displayView($model);
    }
}