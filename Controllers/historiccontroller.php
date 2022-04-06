<?php
namespace Controllers;

use Services\HistoricService;

class HistoricController extends Controller {

	private $histroicService;

	function __construct()
	{
		$this->historicService = new HistoricService();
	}

    function index(){

		$model = $this->historicService->getAll();
		echo $this->displayView($model);
	}
}
?>