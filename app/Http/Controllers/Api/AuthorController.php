<?php

namespace App\Http\Controllers\Api;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponse; 

class AuthorController extends Controller
{
    use ApiResponse; 

    public function index()
    {
        $authors = Author::paginate(10);
        return $this->successResponse($authors, 'Список авторов');
    }

    public function news($authorId)
    {
        $author = Author::with('news.categories')->find($authorId);

        if (!$author) {
            return $this->errorResponse('Автор не найден', 404);
        }

        return $this->successResponse($author->news, 'Новости автора');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:authors,email',
            'avatar' => 'nullable|string',
        ]);

        $author = Author::create($request->only(['full_name', 'email', 'avatar']));

        return $this->successResponse($author, 'Автор успешно создан', 201);
    }
}

