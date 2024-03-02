<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function deleteProduct(Product $product) {
        if (auth()->user()->id === $product['user_id']) {
            $product->delete();
        }
        return redirect('/');
    }

    public function actuallyUpdateProduct(Product $product, Request $request) {
        if (auth()->user()->id !== $product['user_id']) {
            return redirect('/');
        }

        $incomingFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $incomingFields['price'] = strip_tags($incomingFields['price']);
        $incomingFields['quantity'] = strip_tags($incomingFields['quantity']);

        $product->update($incomingFields);
        return redirect('/');
    }


    public function showEditScreen(Product $product) {
        if (auth()->user()->id !== $product['user_id']) {
            return redirect('/');
        }

        return view('edit-product', ['product' => $product]);
    }

    public function createProduct(Request $request) {
       // Validate the request data
       $incomingFields = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'price' => 'required',
        'quantity' => 'required',
    ]);
    
    $incomingFields['title'] = strip_tags($incomingFields['title']);
    $incomingFields['description'] = strip_tags($incomingFields['description']);
    $incomingFields['price'] = strip_tags($incomingFields['price']);
    $incomingFields['quantity'] = strip_tags($incomingFields['quantity']);

    $incomingFields['user_id'] = auth()->id();
    // dd($incomingFields);
    Product::create($incomingFields);
    return redirect('/');

}

}
