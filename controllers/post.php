<?php

Class Controller_Post Extends Controller_Base {

    // Template
    public $layouts = "first_layouts";

    // Action
    function index() {
        $idPost = (isset($_GET['id'])) ? (int) $_GET['id'] : false;
        if ($idPost) {
            $select = array(
                'where' => "id = $idPost" // condition
            );
            $model = new Model_Post($select); // create an object model
            $post = $model->getOneRow(); // get post
        } else {
            $post = false;
        }

        $this->template->vars('post', $post);
        $this->template->view('index');
    }

    
}
