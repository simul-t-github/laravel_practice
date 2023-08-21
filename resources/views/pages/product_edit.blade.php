@extends('layout.layout')
@section('title')
    Prodcut Update
@stop

@section('section')
    <div class="p-4">
        <h4 class="text-center">Update Product</h4>
        <form action="{{ Route('product.update', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-input type='text' name='product_name' label="Product Name" value="{{ $data->product_name }}"
                id="product_name" />
            <x-input type='text' name='quantity' label="Quantity" id="quantity" value="{{ $data->quantity }}" />
            <x-input type='text' name='price' label="Price" id="price" value="{{ $data->price }}" />
            <x-input type='file' name='image' label="Product Image" id="image" />
            <button type="submit" class="btn btn-secondary">Update</button>
        </form>

    </div>
@endsection
