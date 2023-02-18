<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::where('account_id', auth()->id())->get();
        return view('pages.dashboard', [
            'posts' => $posts
        ]);
    }
}
