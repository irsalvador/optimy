<?php

/**
 * BaseRepository class
 * @author Ishmael Salvador <irsalvador06@gmail.com>
 * @since 2024.03.14
 **/
class BaseRepository
{
    protected $db;

    public function __construct(DB $db)
    {
        $this->db = $db;
    }
}