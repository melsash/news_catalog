<?php

namespace App\Http\Controllers\Api;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;

class NewsController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $news = News::with(['author', 'categories'])->paginate(10);
        return $this->successResponse($news, 'Список новостей');
    }

    public function show($id)
    {
        $news = News::with(['author', 'categories'])->find($id);

        if (!$news) {
            return $this->errorResponse('Новость не найдена', 404);
        }

        return $this->successResponse($news, 'Детали новости');
    }

    public function searchByTitle(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
        ]);

        $news = News::where('title', 'like', '%' . $request->title . '%')
            ->with(['author', 'categories'])
            ->paginate(10);

        if ($news->isEmpty()) {
            return $this->errorResponse('Новости не найдены', 404);
        }

        return $this->successResponse($news, 'Результаты поиска');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'announce' => 'required|string',
            'body' => 'required|string',
            'published_at' => 'required|date',
            'author_id' => 'required|exists:authors,id',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $news = News::create($request->only([
            'title', 'announce', 'body', 'published_at', 'author_id'
        ]));

        $news->categories()->attach($request->categories);

        return $this->successResponse($news->load(['author', 'categories']), 'Новость успешно создана', 201);
    }
}
