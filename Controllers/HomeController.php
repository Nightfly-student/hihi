<?php
namespace Controllers;
class HomeController extends Controller {
    function index(){
		$model = "Welkom bij het Haarlem Festival";
		echo $this->displayView($model);
	}
}
?>