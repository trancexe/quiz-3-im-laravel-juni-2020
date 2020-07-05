<?php

namespace App\Http\Controllers;
use App\ArticleModel;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $articles = ArticleModel::getAll();
        return view('article.index', compact('articles'));
    }

    public function create(){
        return view('article.create');
    }

    public function store(request $request){
        unset($request['_token']);
        $store = ArticleModel::storeData($request);
        return redirect()->route('article.index');
    }

    public function edit($id){
        $data = ArticleModel::getByIdEdit($id);
        // return $data;
        return view('article.edit',['articles' => $data]);
    }

    public function show($id){
        $articles = ArticleModel::getById($id);
        // $nam = explode(', ', $articles[0]->tag);
        // $articles['baru'] = 'value baru';
        return view('article.show', ['articles' => $articles]);
        // return dd($articles);
    }

    public function update(request $request, $id){
        unset($request['_token']);
        $update = ArticleModel::updateData($request, $id);
        return redirect()->route('home');
        // return $request;
    }

    public function destroy($id)
    {
        $destroy = ArticleModel::destroyAll($id);
        return redirect()->route('home')->with('status', 'Article successfully deleted');
        // return $destroy;
    }
}
