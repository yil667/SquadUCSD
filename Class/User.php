<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2/25/2017
 * Time: 11:46 AM
 */
class User
{
    // current
    public $userid;
    public $fname;
    public $lname;
    public $email;
    public $phone;
    public $major;
    public $about; // about me
    public $groups; // user's affiliated groups


    public $class1;
    public $class2;
    public $class3;
    public $class4;
    public $class5;
    public $class6;

    // unimplemented
    public $tags;
    public $picture;

    /**
     * User constructor.
     * @param $userid
     * @param $fname
     * @param $lname
     * @param $email
     * @param $phone
     * @param $major
     * @param $about
     */
    public function __construct($userid, $fname, $lname, $email, $phone, $major, $about)
    {
        $this->userid = $userid;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->phone = $phone;
        $this->major = $major;
        $this->about = $about;
    }

    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param mixed $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @return mixed
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * @param mixed $fname
     */
    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    /**
     * @return mixed
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * @param mixed $lname
     */
    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getMajor()
    {
        return $this->major;
    }

    /**
     * @param mixed $major
     */
    public function setMajor($major)
    {
        $this->major = $major;
    }

    /**
     * @return mixed
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * @param mixed $about
     */
    public function setAbout($about)
    {
        $this->about = $about;
    }

    /**
     * @return mixed
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param mixed $groups
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
    }

    /**
     * @param mixed $classes
     */
    public function setClasses($classes)
    {
        $this->classes = $classes;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return mixed
     */
    public function getClass1()
    {
        return $this->class1;
    }

    /**
     * @param mixed $class1
     */
    public function setClass1($class1)
    {
        $this->class1 = $class1;
    }

    /**
     * @return mixed
     */
    public function getClass2()
    {
        return $this->class2;
    }

    /**
     * @param mixed $class2
     */
    public function setClass2($class2)
    {
        $this->class2 = $class2;
    }

    /**
     * @return mixed
     */
    public function getClass3()
    {
        return $this->class3;
    }

    /**
     * @param mixed $class3
     */
    public function setClass3($class3)
    {
        $this->class3 = $class3;
    }

    /**
     * @return mixed
     */
    public function getClass4()
    {
        return $this->class4;
    }

    /**
     * @param mixed $class4
     */
    public function setClass4($class4)
    {
        $this->class4 = $class4;
    }

    /**
     * @return mixed
     */
    public function getClass5()
    {
        return $this->class5;
    }

    /**
     * @param mixed $class5
     */
    public function setClass5($class5)
    {
        $this->class5 = $class5;
    }

    /**
     * @return mixed
     */
    public function getClass6()
    {
        return $this->class6;
    }

    /**
     * @param mixed $class6
     */
    public function setClass6($class6)
    {
        $this->class6 = $class6;
    } // profile picture


}