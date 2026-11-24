<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{
     // Display article list
    public function index(): View
    {
        $articles = Article::with('category')
            ->latest()
            ->get();

        return view('articles.index', compact('articles'));
    }

    // Return articles as JSON
    public function apiIndex(): JsonResponse
    {
        $articles = Article::with('category')
            ->latest()
            ->get();

        return response()->json([
            'data' => $articles,
        ]);
    }

    // Display one article
    public function show(string $permalink): View
    {
        $article = Article::with('category')
            ->where('permalink', $permalink)
            ->firstOrFail();

        return view('articles.show', compact('article'));
    }
}
