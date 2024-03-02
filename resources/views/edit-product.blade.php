@extends('app')

@section('title', 'Product Edit')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Product</h1>
        <form action="/edit-product/{{$product->id}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Name:</label>
                <input type="text" id="title" name="title" class="form-control" value="{{$product->title}}">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control" rows="5">{{$product->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" class="form-control" value="{{$product->price}}">
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" class="form-control" value="{{$product->quantity}}">
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
    @endsection