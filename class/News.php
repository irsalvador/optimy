<?php

include_once('BaseClass.php');

/**
 * Comment class
 * @modified Ishmael Salvador <irsalvador06@gmail.com>
 * @since 2024.03.14
 **/
class News extends BaseClass
{
    protected $title;

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }
}