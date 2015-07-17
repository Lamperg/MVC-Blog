<?php

Class Controller_Logout Extends Controller_Base {

    // Template
    public $layouts = "first_layouts";

    // Action
    function index() {
        unset($_SESSION['Email']);
        session_destroy();
        header("Location: /");
    }

}
