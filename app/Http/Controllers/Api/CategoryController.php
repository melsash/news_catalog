<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;

class CategoryController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $categories = Category::with('children')->paginate(10);
        return $this->successResponse($categories, 'Список категорий');
    }

    public function news($categoryId)
    {
        $category = Category::with('news')->find($categoryId);

        if (!$category) {
            return $this->errorResponse('Категория не найдена', 404);
        }

        return $this->successResponse($category->news, 'Новости категории');
    }

  public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:categories,name',
        'parent_id' => 'nullable|exists:categories,id',
    ]);

    $category = Category::create([
        'name' => $request->name,
        'parent_id' => $request->parent_id,
    ]);

    return $this->successResponse($category, 'Рубрика успешно добавлена', 201);
}
