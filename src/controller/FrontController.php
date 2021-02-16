<?php

namespace App\src\controller;
use App\config\Parameter;
use App\src\DAO\ExtensionDAO;

class FrontController extends Controller{
    public function home(){
        $boss = $this->bossDAO->getAllBoss();
        $extension = $this->extensionDAO->getAllRelations();
        return $this->view->render('home', [
           'allboss' => $boss,
           'allExtension' => $extension
        ]); 
    }
    
    public function boss($bossId){
        $boss = $this->bossDAO->getOneBoss($bossId);
        $comments = $this->commentDAO->getCommentsFromBoss($bossId);
        return $this->view->render('single', [
            'boss' => $boss,
            'allComments' => $comments
        ]);
    }
    public function extension($extensionId){
        $extension = $this->extensionDAO->getOneExtension($extensionId);
        $raid = $this->raidDAO->getRaidsFromExtension($extensionId);
        return $this->view->render('extension', [
            'extensions' => $extension,
            'raids' => $raid
        ]);
    }
    public function raid($raidId){
        $raid = $this->raidDAO->getOneraid($raidId);
        $boss = $this->bossDAO->getBossFromRaid($raidId);
        return $this->view->render('raid', [
            'raids' => $raid,
            'allboss' => $boss
        ]);
    }
    public function addComment(Parameter $post, $bossId)
    {
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Comment');
            if(!$errors) {
                $this->commentDAO->addComment($post, $bossId, $this->session->get('id'));
                $this->session->set('add_comment', 'Le nouveau commentaire a bien été ajouté');
                header('Location: ../public/index.php');

            }
            $boss = $this->bossDAO->getOneboss($bossId);
            $comments = $this->commentDAO->getCommentsFromBoss($bossId);
            return $this->view->render('single', [
                'boss' => $boss,
                'allComments' => $comments,
                'post' => $post,
                'errors' => $errors
            ]);
        }
    }
    public function flagComment($commentId){
        $this->commentDAO->flagComment($commentId);
        $this->session->set('flag_comment', 'Le commentaire a bien été signalé');
        header('Location: ../public/index.php');
    }
    public function register(Parameter $post)
    {
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'User');
            if($this->userDAO->checkUser($post)) {
                $errors['pseudo'] = $this->userDAO->checkUser($post);
            }
            if(!$errors) {
                $this->userDAO->register($post);
                $this->session->set('register', 'Votre inscription a bien été effectuée');
                header('Location: ../public/index.php');
            }
            return $this->view->render('register', [
                'post' => $post,
                'errors' => $errors
            ]);

        }
        return $this->view->render('register');
    }
    public function login(Parameter $post){
        if($post->get('submit')) {
            $user = $this->userDAO->login($post);
            $result = $this->checkLogin($post, $user);
            if($result && $result['isPasswordValid']) {
                $this->session->set('login', 'Content de vous revoir');
                $this->session->set('id', $result['result']['id']);
                $this->session->set('role', $result['result']['name']);
                $this->session->set('pseudo', $post->get('pseudo'));
                header('Location: ../public/index.php');
            }
            else {
                $this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects');
                return $this->view->render('login', [
                    'post'=> $post
                ]);
            }
        }
        return $this->view->render('login');
    }
    public function checkLogin(Parameter $post, $result){
        if ($result !== false){
            $isPasswordValid = password_verify($post->get('password'), $result['password']);
            return [
                'result' => $result,
                'isPasswordValid' => $isPasswordValid
            ];
        }
        return [
            'result' => false,
            'isPasswordValid' => false
        ];
    }
}