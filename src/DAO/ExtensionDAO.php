<?php
namespace App\src\DAO;
use App\config\Parameter;
use App\src\model\Extension;

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
}