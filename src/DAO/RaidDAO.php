<?php
namespace App\src\DAO;
use App\config\Parameter;
use App\src\model\Raid;

class RaidDAO extends DAO {
    
    private function buildObject ($row){
        $raid = new Raid();
        $raid->setId($row['raid_id']);
        $raid->setTitle($row['raid_title']);
        $raid->setCreatedAt($row['raid_createdAt']);
        $raid->setExtensionId($row['raid_extension_id']);
        return $raid;
    }
    public function getRaidObject(array $row)
    {
        $raidModel = $this->buildObject($row);
        return $raidModel;
    }
    public function getRaidsFromExtension($extensionId){
        $sql = 'SELECT raid_id, raid_title, raid_createdAt, raid_extension_id FROM raid WHERE raid_extension_id = ? ORDER BY raid_createdAt DESC';
        $result = $this->createQuery($sql, [$extensionId]);
        $allRaids = [];
        foreach($result as $row){
            $raidId = $row['raid_id'];
            $allRaids[$raidId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $allRaids;
    }

    public function getOneraid($raidId){
        $sql = 'SELECT raid.raid_id, raid.raid_title, raid.raid_createdAt,raid.raid_extension_id FROM raid WHERE raid.raid_id = ?';
        $result = $this->createQuery($sql, [$raidId]);
        $raid = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($raid);
    }
    public function addraid(Parameter $post, $extensionId){
        $sql = 'INSERT INTO raid (raid_title, raid_createdAt, raid_extension_id) VALUES (?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('raid_title'), $extensionId]);
    }
}