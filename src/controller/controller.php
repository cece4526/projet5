<?php

namespace App\src\controller;

use App\config\Request;
use App\src\constraint\Validation;
use App\src\DAO\BossDAO;
use App\src\DAO\CommentDAO;
use App\src\DAO\UserDAO;
use App\src\DAO\ExtensionDAO;
use App\src\DAO\RaidDAO;
use App\src\model\View;

abstract class Controller
{
    protected $bossDAO;
    protected $commentDAO;
    protected $userDAO;
    protected $extensionDAO;
    protected $raidDAO;
    protected $view;
    private $request;
    protected $get;
    protected $post;
    protected $session;
    protected $validation;

    public function __construct()
    {
        $this->bossDAO = new BossDAO();
        $this->commentDAO = new CommentDAO();
        $this->userDAO = new UserDAO();
        $this->extensionDAO = new ExtensionDAO();
        $this->raidDAO = new RaidDAO();
        $this->view = new View();
        $this->validation = new Validation();
        $this->request = new Request();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
    }
}