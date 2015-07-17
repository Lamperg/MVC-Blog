<?php

//authorization check
Class Controller_Admin Extends Controller_Base {

    // Template 
    public $layouts = "first_layouts";

    // Action
    function index() {
        try {
            $dbObject = new PDO(DSN, DB_USER, DB_PASS);
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        if (isset($_POST['submit'])) {
            $errMsg = '';
            //username and password sent from Form
            $email = trim($_POST['email']);
            $pass = trim($_POST['pass']);
            $email = htmlspecialchars($email);
            $pass = htmlspecialchars($pass);
            //error Handling
            if ($email == '')
                $errMsg .= 'You must enter your Username<br>';
            if ($pass == '')
                $errMsg .= 'You must enter your Password<br>';

            if ($errMsg == '') {
                $records = $dbObject->prepare('SELECT * FROM admin WHERE Email = :email');
                $records->bindParam(':email', $email);
                $records->execute();
                $admin = $records->fetch(PDO::FETCH_ASSOC);
                if ($admin['Pass'] == $pass) {
                    $_SESSION['Email'] = $admin['Email'];
                }
            }
        }

        $this->template->vars('admin', $admin);
        $this->template->view('index');
    }

}
