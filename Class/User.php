<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2/25/2017
 * Time: 11:46 AM
 */
class User
{
    private $userid;
    private $fname;
    private $lname;
    private $email;
    private $major;
    private $schedule;
    private $phone;
    private $about; // about me
    private $groups; // user's affiliated groups
    private $picture; // profile picture
    private $classesTaking;
    private $tags;


    /**
     * User constructor.
     * @param $userid
     * @param $email
     * @param $major
     * @param $schedule
     * @param $phone
     * @param $about
     * @param $groups
     * @param $picture
     * @param $classesTaking
     * @param $tags
     * @param $fname
     * @param $lname
     */
    public function __construct($userid, $fname, $lname, $email, $major, $schedule, $phone, $about, $groups, $picture, $classesTaking, $tags)
    {
        $this->userid = $userid;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->major = $major;
        $this->schedule = $schedule;
        $this->phone = $phone;
        $this->about = $about;
        $this->groups = $groups;
        $this->picture = $picture;
        $this->classesTaking = $classesTaking;
        $this->tags = $tags;
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
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * @param mixed $schedule
     */
    public function setSchedule($schedule)
    {
        $this->schedule = $schedule;
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
    public function getClassesTaking()
    {
        return $this->classesTaking;
    }

    /**
     * @param mixed $classesTaking
     */
    public function setClassesTaking($classesTaking)
    {
        $this->classesTaking = $classesTaking;
    } // a list of ID's of classes the user is taking


}