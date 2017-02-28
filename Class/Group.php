<?php


class Group
{
    private $groupid;
    private $name;
    private $class;
    private $size;
    private $maxSize;
    private $users;

    /**
     * Group constructor.
     * @param $groupid
     * @param $name
     * @param $class
     * @param $size
     * @param $maxSize
     */
    public function __construct($groupid, $name, $size, $maxSize, $class)
    {
        $this->groupid = $groupid;
        $this->name = $name;
        $this->size = $size;
        $this->maxSize = $maxSize;
        $this->class = $class;
    }

    /**
     * @return mixed
     */
    public function getGroupid()
    {
        return $this->groupid;
    }

    /**
     * @param mixed $groupid
     */
    public function setGroupid($groupid)
    {
        $this->groupid = $groupid;
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
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param mixed $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param mixed $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getMaxSize()
    {
        return $this->maxSize;
    }

    /**
     * @param mixed $maxSize
     */
    public function setMaxSize($maxSize)
    {
        $this->maxSize = $maxSize;
    }

    public function isFull()
    {
        return $this->size == $this->maxSize;
    }
}