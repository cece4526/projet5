<?php
namespace App\src\DAO;
use App\config\Parameter;
use App\src\model\Raid;

class RaidDAO extends DAO {
    
    private function buildObject ($row){
        $raid = new Raid();
        $raid->setId($row['id']);
        $raid->setTitle($row['title']);
        $raid->setCreatedAt($row['createdAt']);
        return $raid;
    }

    public function getRaidsFromExtension($extensionId){
        $sql = 'SELECT id, title, createdAt FROM raid WHERE extension_id = ? ORDER BY createdAt DESC';
        $result = $this->createQuery($sql, [$extensionId]);
        $allRaids = [];
        foreach($result as $row){
            $raidId = $row['id'];
            $allRaids[$raidId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $allRaids;
    }

    public function getOneraid($raidId){
        $sql = 'SELECT raid.id, raid.title, raid.createdAt FROM raid WHERE raid.id = ?';
        $result = $this->createQuery($sql, [$raidId]);
        $raid = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($raid);
    }
    public function addraid(Parameter $post, $extensionId){
        $sql = 'INSERT INTO raid (title, createdAt, extension_id) VALUES (?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('title'), $extensionId]);
    }
}