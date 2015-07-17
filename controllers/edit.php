<?php

Class Controller_Edit Extends Controller_Base {

    // Template
    public $layouts = "first_layouts";

    //Action
    function index() {

        //the authorization check
        if (!isset($_SESSION['Email']) && empty($_SESSION['Email'])) {
            header("Location: /login");
        } else {
            //Get id post
            $idPost = (isset($_POST['id_post'])) ? (int) $_POST['id_post'] : false;
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

}
