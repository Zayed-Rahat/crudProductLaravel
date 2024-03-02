@extends('app')

@section('title', 'Product')

@section('content')


@if(Auth::check())
  <div class="container custom-container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            <div class="border border-dark rounded p-4">
                <h2 class="text-center mb-4">Create a New Product</h2>
                <form action="/create-product" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Name:</label>
                        <input type="text" id="title" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" id="price" name="price" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" value="0">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Save Product</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="container">
  <div class="row">
      <div class="col">
              <h2 class="text-center p-2">Product List</h2>
              <div class="row">
                  @foreach($products as $product)
                      <div class="col-md-4 mb-4">
                          <div class="card product-card">
                              <div class="card-body">
                                  <h5 class="card-title"> {{$product->title}} by {{ $product->user->name }}</h5>
                                  <p class="card-text">Price: ${{ $product->price }}</p>
                                  <p class="card-text">Quantity: {{ $product->quantity }}</p>
                                  <p class="card-text">{{ $product->description }}</p>
                                  <div class="d-flex justify-content-between align-items-center">
                                      <a href="/edit-product/{{$product->id}}" class="btn btn-primary">Edit</a>
                                      <form action="/delete-product/{{$product->id}}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger">Delete</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endforeach
              </div>
      </div>
  </div>
</div>

@endif
@endsection