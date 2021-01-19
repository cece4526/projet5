<?php
namespace App\src\DAO;
use App\config\Parameter;
use App\src\model\Boss;

class BossDAO extends DAO{

    private function buildObject ($row){
        $boss = new Boss();
        $boss->setId($row['id']);
        $boss->setTitle($row['title']);
        $boss->setContent($row['content']);
        $boss->setAuthor($row['pseudo']);
        $boss->setCreatedAt($row['createdAt']);
        return $boss;
    }
    public function getAllBoss(){
        $sql = 'SELECT boss.id, boss.title, boss.content, user.pseudo, boss.createdAt FROM boss INNER JOIN user ON boss.user_id = user.id ORDER BY boss.id DESC';
        $result = $this->createQuery($sql);
        $boss = [];
        foreach ($result as $row){
            $bossId = $row['id'];
            $boss[$bossId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $boss;
    }

    public function getOneboss($bossId){
        $sql = 'SELECT boss.id, boss.title, boss.content, user.pseudo, boss.createdAt FROM boss INNER JOIN user ON boss.user_id = user.id WHERE boss.id = ?';
        $result = $this->createQuery($sql, [$bossId]);
        $boss = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($boss);
    }

    public function addBoss(Parameter $post, $userId, $raidId){
        $sql = 'INSERT INTO boss (title, content, createdAt, user_id, raid_id) VALUES (?, ?, NOW(), ?, ?)';
        $this->createQuery($sql, [$post->get('title'), $post->get('content'), $userId, $raidId]);
    }
    public function editBoss(Parameter $post, $bossId, $userId){
        $sql = 'UPDATE boss SET title=:title, content=:content, user_id=:user_id WHERE id=:bossId';
        $this->createQuery($sql, [
            'title' => $post->get('title'),
            'content' => $post->get('content'),
            'user_id' => $userId,
            'bossId' => $bossId
        ]);
    }
    public function deleteBoss($bossId){
        $sql = 'DELETE FROM comment WHERE boss_id = ?';
        $this->createQuery($sql, [$bossId]);
        $sql = 'DELETE FROM boss WHERE id = ?';
        $this->createQuery($sql, [$bossId]);
    }
    public function getBossFromRaid($raidId){
        $sql = 'SELECT boss.id, boss.title,boss.content, boss.createdAt, user.pseudo FROM boss INNER JOIN user ON boss.user_id = user.id WHERE raid_id = ? ORDER BY createdAt DESC';
        $result = $this->createQuery($sql, [$raidId]);
        $allBoss = [];
        foreach($result as $row){
            $bossId = $row['id'];
            $allBoss[$bossId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $allBoss;
    }
}