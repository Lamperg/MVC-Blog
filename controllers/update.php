<?php

Class Controller_Update Extends Controller_Base {

    // Template
    public $layouts = "first_layouts";

    //Action
    function index() {
        //the authorization check
        if (!isset($_SESSION['Email']) && empty($_SESSION['Email'])) {
            header("Location: /login");
        } else {

            try {
                $dbObject = new PDO(DSN, DB_USER, DB_PASS);
            } catch (PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
            }

            //Get new data
            $idpost = $_POST['id_post'];
            $title = $_POST['title'];
            $post = $_POST['post'];

            // query
            $sql = "UPDATE post SET Title = :title, 
            Post = :post            
            WHERE Id = :id";
            $stmt = $dbObject->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':post', $post);
            $stmt->bindParam(':id', $idpost);
            $update = $stmt->execute();
        }
        $this->template->vars('update', $update);
        $this->template->view('index');
    }

}
