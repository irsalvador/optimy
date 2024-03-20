<?php

include_once('BaseClass.php');

/**
 * Comment class
 * @modified Ishmael Salvador <irsalvador06@gmail.com>
 * @since 2024.03.14
 */
class Comment extends BaseClass
{
    protected $newsId;

    public function getNewsId()
    {
        return $this->newsId;
    }

    public function setNewsId($newsId)
    {
        $this->newsId = $newsId;
        return $this;
    }
}