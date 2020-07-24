<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Ligne;

class AdminController extends Controller
{
    public function delete($article)
    {
        Article::destroy($article);
        session()->flash('test',0);
        return redirect()->route('adminPanel');
    }
}
