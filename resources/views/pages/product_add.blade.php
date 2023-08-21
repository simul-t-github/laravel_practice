@extends('layout.layout')
@section('title')
    Prodcut Add
@stop
@section('section')
    <div class="p-4">
        <h4 class="text-center">Add Product</h4>
        <form action="{{ Route('product.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-input type='text' name='product_name' label="Product Name" value="{{ old('product_name') }}"
                id="product_name" />
            <x-input type='text' name='quantity' label="Quantity" id="quantity" value="{{ old('quantity') }}" />
            <x-input type='text' name='price' label="Price" id="price" value="{{ old('price') }}" />
            <x-input type='file' name='image' label="Product Image" id="image" />

            <button type="submit" class="btn btn-secondary">Submit</button>
        </form>

    </div>
@endsection
