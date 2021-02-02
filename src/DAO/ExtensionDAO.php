<?php
namespace App\src\DAO;
use App\config\Parameter;
use App\src\model\Extension;
use App\src\model\Raid;

class ExtensionDAO extends DAO {
    
    private function buildObject ($row){
        $extension = new Extension();
        $extension->setId($row['id']);
        $extension->setTitle($row['title']);
        $extension->setCreatedAt($row['createdAt']);
        return $extension;
    }
    public function getAllExtension(){
        $sql = 'SELECT extension.id, extension.title, extension.createdAt FROM extension ORDER BY extension.id DESC';
        $result = $this->createQuery($sql);
        $extension = [];
        foreach ($result as $row){
            $extensionId = $row['id'];
            $extension[$extensionId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $extension;
    }


    public function getOneExtension($extensionId){
        $sql = 'SELECT extension.id, extension.title, extension.createdAt FROM extension WHERE extension.id = ?';
        $result = $this->createQuery($sql, [$extensionId]);
        $extension = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($extension);
    }
    public function addExtension(Parameter $post, $userId){
        $sql = 'INSERT INTO extension (title, createdAt) VALUES (?, NOW())';
        $this->createQuery($sql, [$post->get('title')]);
    }
    public function deleteExtension($extensionId){
        $sql = 'DELETE FROM extension WHERE id = ?';
        $this->createQuery($sql, [$extensionId]);
    }
    public function getAllRelations()
    {
        $sql = 'SELECT extension.id, extension.title, extension.createdAt, boss.boss_id, boss.boss_title,boss.boss_content, boss.boss_createdAt, boss.boss_raid_id, user.pseudo, raid_id,raid.raid_id, raid.raid_title, raid.raid_createdAt,raid.raid_extension_id FROM extension LEFT JOIN raid ON extension.id = raid.raid_extension_id LEFT JOIN boss ON raid.raid_id = boss.boss_raid_id INNER JOIN user ON boss.boss_user_id = user.id';
        $results = $this->createQuery($sql);
        $allExtensions = [];
        foreach ($results as $row){
            $extensionId = $row['id'];
            $allExtensions[$extensionId] = $this->buildObject($row);      
            $raidDAO = new RaidDAO;
            $raidModel = $raidDAO->getRaidObject($row);
            $allExtensions[$extensionId]->addRaids($raidModel);
            $bossDAO = new BossDAO;
            $bossModel = $bossDAO->getBossObject($row);
            $raidModel->addAllBoss($bossModel);
        }
        return $allExtensions;
    }
}