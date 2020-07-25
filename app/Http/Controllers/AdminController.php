<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Article;
use App\Ligne;

class AdminController extends Controller
{
    public function delete($article, Request $request)
    {
        Article::destroy($article);
        session()->flash('test', 0);
        $request->session()->flash('deleted', 'L\'article a bien été supprimer!');
        return redirect()->route('adminPanel');
    }
}
