<?php

Class Controller_Login Extends Controller_Base {
    
    // Template 
    public $layouts = "first_layouts";

    // Action
    function index() {         
                
        $this->template->view('index');
       
    }
}



