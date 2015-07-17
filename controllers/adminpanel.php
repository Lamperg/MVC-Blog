<?php

Class Controller_AdminPanel Extends Controller_Base {

    // Template
    public $layouts = "first_layouts";

    // Action
    function index() {
        //the authorization check
        if (!isset($_SESSION['Email']) && empty($_SESSION['Email'])) {
            header("Location: /login");
        }
                             
        $this->template->view('index');
    }

}
