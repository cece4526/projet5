<?php
namespace App\src\DAO;
use App\config\Parameter;
use App\src\model\Raid;

class RaidDAO extends DAO {
    
    private function buildObject ($row){
        $raid = new Raid();
        $raid->setId($row['id']);
        $raid->setTitle($row['title']);
        $raid->setAuthor($row['pseudo']);
        $raid->setCreatedAt($row['createdAt']);
        return $raid;
    }

    public function getRaidsFromExtension($extensionId){
        $sql = 'SELECT id, title, createdAt FROM raid WHERE extension_id = ? ORDER BY createdAt DESC';
        $result = $this->createQuery($sql, [$extensionId]);
        $allRaids = [];
        foreach($result as $row){
            $raidId = $row['id'];
            $allraids[$raidId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $allraids;
    }

    public function getOneraid($raidId){
        $sql = 'SELECT raid.id, raid.title, user.pseudo, raid.createdAt FROM raid INNER JOIN user ON raid.user_id = user.id WHERE raid.id = ?';
        $result = $this->createQuery($sql, [$raidId]);
        $raid = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($raid);
    }
    public function addraid(Parameter $post, $userId){
        $sql = 'INSERT INTO raid (title, createdAt, user_id) VALUES (?, ?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('title'), $userId]);
    }
}