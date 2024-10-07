<?php

namespace App\Http\Controllers\Api;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'qty' => 'required|integer|min:0',
        ]);

        Product::create($data);

        return response()->json([
            'message' => 'Row saved successfully!',
            'data' => $data
        ], 201);
    }
}
