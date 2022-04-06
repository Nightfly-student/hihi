<?php
namespace Controllers;
class PopupsController extends Controller {
    function index(){
		$model = "Welkom bij het Haarlem Festival";
		echo $this->displayView($model);
	}
}
?>