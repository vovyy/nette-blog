<?php

namespace App\Presenters;

use Nette;
use Nette\Database\Context;
use Nette\Http\Request;



class ArticlesPresenter extends Nette\Application\UI\Presenter
{
    private Nette\Database\Explorer $database;
    private Nette\Http\Request $httpRequest;

    public function __construct(Nette\Database\Explorer $database)
    {
        $this->database = $database;
    }




    public function actionGet(): void
    {
        $articles = $this->database->table('articles');



        $return = [];

        foreach ($articles as $article) {
            $return[] = [
                'id' => $article->id,
                'title' => $article->title,
                'content' => $article->content
            ];
        }
        $this->sendJson($return);
    }

    public function actionEdit()
    {
        $httpRequest = $this->getHttpRequest("http://localhost:8081/add");
        $data = [
            'title' => 'title',

        ];
        $this->sendJson($data);
        bdump($data);
        // $data = ['hello' => 'nette'];
        // 	$this->sendJson($data);

    }
}
