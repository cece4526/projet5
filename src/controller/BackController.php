<?php

namespace App\src\controller;
use App\config\Parameter;

class BackController extends Controller{
    private function checkLoggedIn(){
        if(!$this->session->get('pseudo')) {
            $this->session->set('need_login', 'Vous devez vous connecter pour accéder à cette page');
            header('Location: ../public/index.php?route=login');
        } else {
            return true;
        }
    }

    private function checkAdmin(){
        $this->checkLoggedIn();
        if(!($this->session->get('role') === 'admin')) {
            $this->session->set('not_admin', 'Vous n\'avez pas le droit d\'accéder à cette page');
            header('Location: ../public/index.php?route=profile');
        } else {
            return true;
        }
    }

    public function administration(){
        if($this->checkAdmin()) {
            $extension = $this->extensionDAO->getAllExtension();
            $raid = $this->raidDAO->getRaidsFromExtension($extension[1]->getId());
            $boss = $this->bossDAO->getBossFromRaid($raid[1]->getId());
            $comments = $this->commentDAO->getFlagComments();
            $users = $this->userDAO->getUsers();

            return $this->view->render('administration', [
                'allextension' => $extension,
                'raids' => $raid,
                'boss' => $boss,
                'comments' => $comments,
                'users' => $users
            ]);   
        }
    }
    public function addboss(Parameter $post, $raidId)
    {
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'boss');
            if(!$errors) {
                $this->bossDAO->addboss($post, $this->session->get('id'),$raidId);
                $raid = $this->raidDAO->getOneraid($raidId);
                $this->session->set('add_boss', 'Le nouvel boss a bien été ajouté');
                header('Location: ../public/index.php?route=administration');
            }
            return $this->view->render('add_boss', [
                'post' => $post,
                'errors' => $errors,
                'raids' => $raid
            ]);
        }
        return $this->view->render('add_boss');
    }
    public function addExtension(Parameter $post)
    {
        if($post->get('submit')) {

                $this->extensionDAO->addExtension($post, $this->session->get('id'));
                $this->session->set('add_extension', 'La nouvel extension a bien été ajouté');
                header('Location: ../public/index.php?route=administration');
            return $this->view->render('add_extension', [
                'post' => $post,
            ]);
        }
        return $this->view->render('add_extension');
    }
    public function AddRaid(Parameter $post, $bossId)
    {
        if($post->get('submit')) {

            $this->raidDAO->addraid($post, $this->session->get('id'));
            $this->session->set('add_raid', 'La nouvel extension a bien été ajouté');
            header('Location: ../public/index.php?route=extension');
        return $this->view->render('add_raid', [
            'post' => $post,
        ]);
    }
    return $this->view->render('add_extension');
    }
    public function editboss(Parameter $post, $bossId)
    {
        $boss = $this->bossDAO->getOneboss($bossId);
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'boss');
            if(!$errors) {
                $this->bossDAO->editboss($post, $bossId, $this->session->get('id'));
                $this->session->set('edit_boss', 'L\' boss a bien été modifié');
                header('Location: ../public/index.php?route=administration');
            }
            return $this->view->render('edit_boss', [
                'post' => $post,
                'errors' => $errors,
            ]);

        }
        $post->set('id', $boss->getId());
        $post->set('title', $boss->getTitle());
        $post->set('content', $boss->getContent());
        $post->set('author', $boss->getAuthor());

        return $this->view->render('edit_boss', [
            'post' => $post
        ]);
    }
    public function deleteboss($bossId){
        $this->bossDAO->deleteboss($bossId);
        $this->session->set('delete_boss', 'Le boss a bien été supprimé');
        header('Location: ../public/index.php?route=administration');
    }
    public function unflagComment($commentId){
        $this->commentDAO->unflagComment($commentId);
        $this->session->set('unflag_comment', 'Le commentaire a bien été désignalé');
        header('Location: ../public/index.php?route=administration');
    }
    public function deleteComment($commentId){
        $this->commentDAO->deleteComment($commentId);
        $this->session->set('delete_comment', 'Le commentaire a bien été supprimé');
        header('Location: ../public/index.php');
    }
    public function profile(){
        return $this->view->render('profile');
    }
    public function updatePassword(Parameter $post){
        if($post->get('submit')) {
            $this->userDAO->updatePassword($post, $this->session->get('pseudo'));
            $this->session->set('update_password', 'Le mot de passe a été mis à jour');
            header('Location: ../public/index.php?route=profile');
        }
        return $this->view->render('update_password');
    }
    public function logout(){
        $this->logoutOrDelete('logout');
    }

    public function deleteAccount(){
        $this->userDAO->deleteAccount($this->session->get('pseudo'));
        $this->logoutOrDelete('delete_account');
    }
    
    public function deleteUser($userId){
        $this->userDAO->deleteUser($userId);
        $this->session->set('delete_user', 'L\'utilisateur a bien été supprimé');
        header('Location: ../public/index.php?route=administration');
    }

    private function logoutOrDelete($param){
        $this->session->stop();
        $this->session->start();
        if($param === 'logout') {
            $this->session->set($param, 'À bientôt');
        } else {
            $this->session->set($param, 'Votre compte a bien été supprimé');
        }
        header('Location: ../public/index.php');
    }
}