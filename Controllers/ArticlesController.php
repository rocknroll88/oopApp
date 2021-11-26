<?php
namespace Controllers;
use classes\View;
use Services\Db;
use Models\Article;
use Models\User;
class ArticlesController 
{
    private $view;
    private $db;
    public function __construct()
    {
        $this->view = new View(__DIR__ . '../../Views/templates');
        $this->db = Db::getInstance();
    }
    public function view(int $id)
    {
       $article = Article::getById($id);
    //    $reflector = new \ReflectionObject($article);
    //     $properties = $reflector->getProperties();
    //     $propertisName = [];
    //     foreach ($properties as $propertyName)
    //     {
    //         $propertisName[] = $propertyName->getName();
    //     }
    //     var_dump($propertisName);
        if($article === [])
        {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        $this->view->renderHtml('article.php', 
        [
            'article' => $article
        ]);
    }

    
}