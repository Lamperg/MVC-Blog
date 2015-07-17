<?php

Class Controller_Add Extends Controller_Base {

    // Template
    public $layouts = "first_layouts";

    //Action
    function index() {

        $title = $_POST['title'];
        $post = $_POST['post'];

        $model = new Model_Post();
        // Set values for table fields
        $model->author = $_SESSION['Email'];
        $model->title = $title;
        $model->post = $post;
        $model->time = date('Y:m:d H:i:s');
        $result = $model->save(); // Create record
        
        $this->template->view('index');
    }

}
