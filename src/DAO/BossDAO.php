<?php
namespace App\src\DAO;
use App\config\Parameter;
use App\src\model\Boss;

class BossDAO extends DAO{

    private function buildObject ($row){
        $boss = new Boss();
        $boss->setId($row['boss_id']);
        $boss->setTitle($row['boss_title']);
        $boss->setContent($row['boss_content']);
        $boss->setAuthor($row['pseudo']);
        $boss->setCreatedAt($row['boss_createdAt']);
        $boss->setRaidId($row['boss_raid_id']);
        return $boss;
    }
    public function getBossObject(array $row)
    {
        $bossModel = $this->buildObject($row);
        return $bossModel;
    }
    public function getAllBoss(){
        $sql = 'SELECT boss.boss_id, boss.boss_title, boss.boss_content, user.pseudo, boss.boss_createdAt, boss.boss_raid_id FROM boss INNER JOIN user ON boss.boss_user_id = user.id ORDER BY boss.boss_id DESC';
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
        $sql = 'SELECT boss.boss_id, boss.boss_title, boss.boss_content, user.pseudo, boss.boss_createdAt,boss.boss_raid_id FROM boss INNER JOIN user ON boss.boss_user_id = user.id WHERE boss.boss_id = ?';
        $result = $this->createQuery($sql, [$bossId]);
        $boss = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($boss);
    }

    public function addBoss(Parameter $post, $userId, $raidId){
        $sql = 'INSERT INTO boss (boss_title, boss_content, boss_createdAt, user_id, boss_raid_id) VALUES (?, ?, NOW(), ?, ?)';
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
        $sql = 'SELECT boss.boss_id, boss.boss_title,boss.boss_content, boss.boss_createdAt, user.pseudo, raid_id FROM boss INNER JOIN user ON boss.boss_user_id = user.id WHERE raid_id = ? ORDER BY createdAt DESC';
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