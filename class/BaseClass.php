<?php
/**
 * BaseClass
 * Common base class to hold common functionality between classes
 * @author Ishmael Salvador <irsalvador06@gmail.com>
 * @since 2024.03.14
 */
class BaseClass
{
    protected $id, $body, $createdAt;

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}