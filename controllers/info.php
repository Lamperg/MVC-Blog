<?php

Class Controller_Info Extends Controller_Base {
    
    // Template 
    public $layouts = "first_layouts";

    // Action
    function index() {         
                
        $this->template->view('index');
       
    }
}

