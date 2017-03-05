<?php


class Group
{
    public $MAX_GROUP_SIZE = 10;

    public $groupid;
    public $name;
    public $class;
    public $size;
    public $maxSize;
    public $users;

    public $isFull;
    public $isMax;

    /**
     * Group constructor.
     * @param $groupid
     * @param $name
     * @param $class
     * @param $size
     * @param $maxSize
     */
    public function __construct($groupid, $name, $size, $maxSize, $class, $users)
    {
        $this->groupid = $groupid;
        $this->name = $name;
        $this->size = $size;
        $this->maxSize = $maxSize;
        $this->class = $class;
        $this->users = $users;
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

    // returns true if the group contains the user with given ID
    public function hasUser($id)
    {
        // if the user array is empty, return false
        if (!sizeof($this->users == 0))
            return false;

        // loop through all the users and determine if a given user is in the group
        foreach ($this->users as $user) {
            if ($user->getUserid() == $id)
                return true;
        }

        // given user is not found in the group
        return false;
    }

    public function isMax()
    {
        return $this->size == $this->MAX_GROUP_SIZE;
    }
}