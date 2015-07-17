<?php

Abstract Class Controller_Base {

    protected $template;
    protected $layouts; // Template
    public $vars = array();
    public $user;

    // In controller connect templates
    function __construct() {

        $this->template = new Template($this->layouts, get_class($this));
    }

    abstract function index();
}
