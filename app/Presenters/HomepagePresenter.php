<?php

namespace App\Presenters;

use Nette;
use Nette\Database\Context;


class HomepagePresenter extends Nette\Application\UI\Presenter

{
    public $database;

    public function injectContext(Context $database)
    {
        $this->database = $database;
    }


    public function actionGetArticles($articles): void
    {
        $return = [];

        foreach ($articles as $article) {
            $return[] = [
                'id' => $article->id,
                'title' => $article->title,
                'content' => $article->content
            ];
        }
    }
    public function renderDefault($return): void
    {
        $arr = array(1, 2, 3, 4);
        $this->sendJson($return);
    }
}
