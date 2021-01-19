<?php
namespace App\src\DAO;
use App\config\Parameter;
use App\src\model\Comment;

class CommentDAO extends DAO{

    private function buildObject($row){
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['content']);
        $comment->setCreatedAt($row['createdAt']);
        $comment->setFlag($row['flag']);
        return $comment;
    }

    public function getCommentsFromBoss($bossId){
        $sql = 'SELECT id, pseudo, content, createdAt, flag FROM comment WHERE boss_id = ? ORDER BY createdAt DESC';
        $result = $this->createQuery($sql, [$bossId]);
        $allComments = [];
        foreach($result as $row){
            $commentId = $row['id'];
            $allComments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $allComments;
    }
    public function addComment(Parameter $post, $bossId){
        $sql = 'INSERT INTO comment (pseudo, content, createdAt, boss_id) VALUES (?, ?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('pseudo'), $post->get('content'), $bossId]);
    }
    public function flagComment($commentId){
        $sql = 'UPDATE comment SET flag = ? WHERE id = ?';
        $this->createQuery($sql, [1, $commentId]);
    }
    public function unflagComment($commentId){
        $sql = 'UPDATE comment SET flag = ? WHERE id = ?';
        $this->createQuery($sql, [0, $commentId]);
    }
    public function deleteComment($commentId){
        $sql = 'DELETE FROM comment WHERE id = ?';
        $this->createQuery($sql, [$commentId]);
    }
    public function getFlagComments(){
        $sql = 'SELECT id, pseudo, content, createdAt, flag FROM comment WHERE flag = ? ORDER BY createdAt DESC';
        $result = $this->createQuery($sql, [1]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }
}