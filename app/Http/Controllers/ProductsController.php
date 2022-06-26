<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductsResource;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function getProducts(){
        $products = Products::all();
        return ProductsResource::collection($products);
    }
}
