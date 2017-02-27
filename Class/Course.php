<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2/27/2017
 * Time: 3:05 PM
 */
class Course
{
    private $class;
    private $searchGroup;

    /**
     * Course constructor.
     * @param $class
     * @param $searchGroup
     */
    public function __construct($class, $searchGroup)
    {
        $this->class = $class;
        $this->searchGroup = $searchGroup;
    }

    /**
     * This method returns all the classes the user is taking
     */
    public function getAllClass()
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
    public function getSearchGroup()
    {
        return $this->searchGroup;
    }

    /**
     * @param mixed $searchGroup
     */
    public function setSearchGroup($searchGroup)
    {
        $this->searchGroup = $searchGroup;
    }


}