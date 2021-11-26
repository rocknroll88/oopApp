<?php
namespace Controllers;
use classes\View;
use Services\Db;
use Models\Article;
class MainController 
{
    private $view;
    private $db;
    public function __construct()
    {
        $this->view = new View(__DIR__ . '../../Views/templates');
        $this->db = Db::getInstance();
    }
    public function main()
    {
        $articles = Article::findAll();
        $this->view->renderHtml('main.php', ['articles' => $articles]);
    }
}