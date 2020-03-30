<?php

namespace Wiki\Catalog\Data\Model;

class Tag implements ModelInterface
{
    private $id;
    private $name;
    private $key;

    /**
     * ArticleTag constructor.
     * @param $name
     * @param $key
     */
    public function __construct(string $name = null, string $key = null)
    {
        $this->name = $name;
        $this->key = $key;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $key
     */
    public function setKey($key): void
    {
        $this->key = $key;
    }
}