<?php
namespace Controllers;

    class ContactController extends Controller {
        public function index(){
            echo $this->displayViewOnly();
        }
    }