<?php

Class Model_Admin Extends Model_Base {

    public $id;
    public $email;
    public $pass;

    public function fieldsTable() {
        return array(
            'id' => 'Id',
            'email' => 'Email',
            'pass' => 'Pass',          
        );
    }

}



