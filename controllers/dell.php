<?php

Class Controller_Dell Extends Controller_Base {

    // Template
    public $layouts = "first_layouts";

    //Action
    function index() {
                 
        $dell = $_POST['id_post'];
        //$idPost = (isset($dell)) ? (int) $dell : false;
        //if ($idPost) {
        $model = new Model_Post(); // create an object model
        $select = array(
           'where' => "id = $dell" // condition
        );

        //Delete the row
       $post = $model->deleteBySelect($select);
     
        $this->template->vars('post', $post);
        $this->template->view('index');
    }

}
