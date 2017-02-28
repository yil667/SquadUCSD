<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2/27/2017
 * Time: 3:05 PM
 */
class Course
{
    private $className;
    private $searchGroup;

    /**
     * Course constructor.
     * @param $class
     * @param $searchGroup
     */
    public function __construct($class, $searchGroup)
    {
        $this->className = $class;
        $this->searchGroup = $searchGroup;
    }

    /**
     * This method returns all the classes the user is taking
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @param mixed $className
     */
    public function setClassName($className)
    {
        $this->className = $className;
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