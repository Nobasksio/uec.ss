<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 21/05/2019
 * Time: 16:45
 */

namespace App\Http\Controllers;


use App\Article;

class ArticleController extends Controller
{
    public function indexArticle(){
        $articles = Article::all();
        return view('article/index',['articles' => $articles]);
    }
}