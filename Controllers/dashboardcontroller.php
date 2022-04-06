<?php
namespace Controllers;

use Services\UserService;
use Services\DashboardService;

class DashboardController extends Controller
{        
    private $dashboardService;

    function __construct()
    {
        $this->dashboardService = new DashboardService();
    }
    function index(){
        $model = $this->dashboardService->getProfile($_SESSION['username']);
        echo $this->displayView($model);
    }  

    //validate email
    function changeemail() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING, FILTER_VALIDATE_EMAIL);
        $datauser = [
            'email' => trim($_POST['email'])
        ];
        if(!filter_var($datauser['email'], FILTER_VALIDATE_EMAIL)){
        }
        else {
            //sends email to repository to be edited in database
            $model = $this->dashboardService->changeEmail($_SESSION['username'], $datauser);    
            //redirects back to dashboard        
            header("Location: /dashboard");
            exit();
        }        
    }

    //validate password
    function changePassword() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $datauser = [
            'password' => trim($_POST['password']),
            'passwordNew' => trim($_POST['passwordNew']),
            'passwordNewRepeat' => trim($_POST['passwordNewRepeat'])
        ];
        if(empty($datauser['password']) || empty($datauser['passwordNew']) || empty($datauser['passwordNewRepeat'])) {
            return 'One or more input fields are empty';
        }
        else {
            $model = $this->dashboardService->saveProfile($_SESSION['username'], $datauser);
        }
    }

    //validate profile
    function saveprofile() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $datauser = [
            'firstname' => trim($_POST['firstname']),
            'lastname' => trim($_POST['lastname']),
            'address' => trim($_POST['address']),
            'country' => trim($_POST['country']),
            'phonenumber' => trim($_POST['phonenumber'])
        ];
        if(empty($datauser['firstname']) || empty($datauser['lastname']) || empty($datauser['address']) || empty($datauser['country']) || empty($datauser['phonenumber'])) {
           return 'One or more input fields are empty.';
        }
        else {
            //sends new data to update user data to database billing_info
            $model = $this->dashboardService->saveProfile($_SESSION['username'], $datauser);
            //redirects back to dashboard        
            header("Location: /dashboard");
            exit();
        }
    }
}