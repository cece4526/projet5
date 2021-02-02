<?php

namespace App\src\model;

class Raid{
    /**
     * @var int
     */
    private $raidId;

    /**
     * @var string
     */
    private $title;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var int
     */
    private $extensionId;
    /**
     * array <Boss>
     */
    private $allBoss = [];
    /**
     * @return int
     */
    public function getId(){
        return $this->raidId;
    }

    /**
     * @param int $raidId
     */
    public function setId($raidId){
        $this->raidId = $raidId;
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
    public function getExtensionId(){
        return $this->extensionId;
    }

    /**
     * @param int $extensionId
     */
    public function setExtensionId($extensionId){
        $this->extensionId = $extensionId;
    }
    public function getAllBoss(){
        return $this->allBoss;
    }
    /**
     * @param array <boss>
     */
    public function setAllBoss(array $allBoss){
        $this->allBoss = $allBoss;
    }
    public function addAllBoss(Boss $boss)
    {
       $this->allBoss[] = $boss;
    }
}