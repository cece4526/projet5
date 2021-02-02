<?php

namespace App\src\model;

class Extension{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var array <Raid>
     */
    private $raids = [];

    /**
     * @var array <boss>
     */
    private $boss = [];
    /**
     * @return int
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id){
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(){
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title){
        $this->title = $title;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(){
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt){
        $this->createdAt = $createdAt;
    }
    /**
     * @return array
     */
    public function getRaids(){
        return $this->raids;
    }
    /**
     * @param array 
     */
    public function setRaids(array $raids){
        $this->raids = $raids;
    }
    /**
     * 
    */
    public function addRaids(Raid $raid)
    {
       $this->raids[] = $raid;
    }
}