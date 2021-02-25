<?php

namespace App\config;
use App\src\controller\FrontController;
use App\src\controller\BackController;
use App\src\controller\ErrorController;
use Exception;

class Router{

    private $frontController;
    private $backController;
    private $errorController;
    private $request;

    public function __construct()
    {
        $this->request = new Request();
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();   
    }

    public function run(){
        $route = $this->request->getGet()->get('route');

        try{
            if($route !== NULL){             
                if($route === 'boss'){
                    $this->frontController->boss($this->request->getGet()->get('bossId'));
                }
                elseif ($route === 'addBoss'){
                    $this->backController->addBoss($this->request->getPost(), $this->request->getGet()->get('raidId'));
                }
                elseif ($route === 'extension'){
                    $this->frontController->extension($this->request->getGet()->get('extensionId'));
                }
                elseif ($route === 'raid'){
                    $this->frontController->raid($this->request->getGet()->get('raidId'));
                }
                elseif ($route === 'editBoss'){
                    $this->backController->editBoss($this->request->getPost(), $this->request->getGet()->get('bossId'));
                }
                elseif($route === 'deleteBoss'){
                    $this->backController->deleteBoss($this->request->getGet()->get('bossId'));
                }
                elseif($route === 'deleteRaid'){
                    $this->backController->deleteRaid($this->request->getGet()->get('raidId'));
                }
                elseif($route === 'deleteExtension'){
                    $this->backController->deleteExtension($this->request->getGet()->get('extensionId'));
                }
                elseif($route === 'addComment'){
                    $this->frontController->addComment($this->request->getPost(), $this->request->getGet()->get('bossId'));
                }
                elseif($route === 'flagComment'){
                    $this->frontController->flagComment($this->request->getGet()->get('commentId'));
                }
                elseif($route === 'unflagComment'){
                    $this->backController->unflagComment($this->request->getGet()->get('commentId'));
                }
                elseif($route === 'deleteComment'){
                    $this->backController->deleteComment($this->request->getGet()->get('commentId'));
                }
                elseif($route === 'register'){
                    $this->frontController->register($this->request->getPost());
                }
                elseif($route === 'login'){
                    $this->frontController->login($this->request->getPost());
                }
                elseif($route === 'profile'){
                    $this->backController->profile();
                }
                elseif($route === 'updatePassword'){
                    $this->backController->updatePassword($this->request->getPost());
                }
                elseif($route === 'logout'){
                    $this->backController->logout();
                }
                elseif($route === 'deleteAccount'){
                    $this->backController->deleteAccount();
                }
                elseif($route === 'deleteUser'){
                    $this->backController->deleteUser($this->request->getGet()->get('userId'));
                }
                elseif($route === 'administration'){
                    $this->backController->administration();
                }
                elseif ($route === 'addExtension'){
                    $this->backController->addExtension($this->request->getPost());
                }
                elseif ($route === 'addRaid'){
                    $this->backController->addRaid($this->request->getPost(), $this->request->getGet()->get('extensionId'));
                }
                else{
                    $this->errorController->errorNotFound();
                }
            }
            else{
                $this->frontController->home();
            }
        }
        catch(Exception $e){
            $this->errorController->errorServer();
        }
    }
}