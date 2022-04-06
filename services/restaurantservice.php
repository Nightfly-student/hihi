<?php 
namespace Services;

use Models\Restaurant;
use PDO;
use Repositories\RestaurantRepository;

class RestaurantService {
    // gets all restaurants from db //
    public function getAll() {
        $repository = new RestaurantRepository();
        return $repository->getAll();
    }

    //Anel | Get all restaurants only 
    public function getAllRestaurants() {
        $repository = new RestaurantRepository();
        return $repository->getAllRestaurants();
    }
    public function createRestaurant($restaurant){
        $repo = new RestaurantRepository();
        return $repo->createRestaurant($restaurant);
    }
    public function deleteRestaurant($id){
        $repo = new RestaurantRepository();
        return $repo->deleteRestaurant($id);
    }
    public function getRestaurantById($id){
        $repo = new RestaurantRepository();
        return $repo->getRestaurantById($id);
    }
    public function updateRestaurant($restaurant){
        $repo = new RestaurantRepository();
        return $repo->updateRestaurant($restaurant);
    }
}