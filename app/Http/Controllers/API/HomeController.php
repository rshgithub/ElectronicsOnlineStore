<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\productResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all()->take(4);
        $products = Product::orderBy('id', 'desc')->take(5)->get();

        return response()->json([
            'message' => 'Welcome to our electronics online store',
            'data' => [
                'categories' => $categories,
                'products' => productResource::make($products),
            ],
        ], 200);
    }
}
