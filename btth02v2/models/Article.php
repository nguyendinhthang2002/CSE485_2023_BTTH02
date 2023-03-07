<?php
class Article
{
    // Thuộc tính
    private $art_id;
    private $title;
    private $song;
    private $cat_id;
    private $summary;
    private $content;
    private $aut_id;
    private $date;
    private $picture;

    public function __construct($art_id, $title, $song, $cat_id, $summary, $content, $aut_id, $date, $picture)
    {
        $this->art_id = $art_id;
        $this->title = $title;
        $this->song = $song;
        $this->cat_id = $cat_id;
        $this->summary = $summary;
        $this->content = $content;
        $this->aut_id = $aut_id;
        $this->date = $date;
        $this->picture = $picture;
    }

    // Setter và Getter
    public function getArtId()
    {
        return $this->art_id;
    }

    public function setArtId($id)
    {
        $this->art_id = $art_id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getSong()
    {
        return $this->song;
    }

    public function setSong($song)
    {
        $this->song = $song;
    }

    public function getCatId()
    {
        return $this->cat_id;
    }

    public function setCatId($cat_id)
    {
        $this->cat_id = $cat_id;
    }

    public function getSummary()
    {
        return $this->summary;
    }

    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getAutId()
    {
        return $this->aut_id;
    }

    public function setAutId($aut_id)
    {
        $this->aut_id = $aut_id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }
}
