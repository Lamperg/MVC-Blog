<?php

Class Model_Post Extends Model_Base {

    public $id;
    public $author;
    public $time;
    public $title;
    public $post;

    public function fieldsTable() {
        return array(
            'id' => 'Id',
            'author' => 'Author',
            'time' => 'Time',
            'title' => 'Title',
            'post' => 'Post',
        );
    }

}
