<?php

Class Controller_Index Extends Controller_Base {

    // Template
    public $layouts = "first_layouts";

    // Action
    function index() {
        $select = array('where' => "Id >=1", 'order' => 'time DESC');
        $model = new Model_Post($select);
        $posts = $model->getAllRows();
        
        
    
  

        $this->template->vars('posts', $posts);
        $this->template->view('index');
               
    }
    }


