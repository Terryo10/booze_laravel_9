<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriesResource;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function getCategories(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $categories = Categories::all();
        return CategoriesResource::collection($categories);
    }
}
