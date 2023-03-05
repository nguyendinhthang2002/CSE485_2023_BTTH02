<?php
class Author {
    private $author_id;
    private $author_name;
    private $author_img;

    public function __construct($author_id, $author_name, $author_img)
    {
        $this->author_id = $author_id;
        $this->author_name =  $author_name;
        $this->author_img = $author_img;
    }

    public function getAuthorId() {
        return $this->author_id;
    }

    public function setAuthorId($author_id) {
        $this->author_id = $author_id;
    }

    public function getAuthorName() {
        return $this->author_name;
    }

    public function setAuthorName($author_name) {
        $this->author_name = $author_name;
    }

    public function getAuthorImg() {
        return $this->author_img;
    }

    public function setAuthorImg($author_img) {
        $this->author_img = $author_img;
    }
}