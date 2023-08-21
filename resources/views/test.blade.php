@extends('layout.layout')

@section('section')
<div class="p-4">
    <h4 class="text-center">Add Product</h4>
    <form action="" method="post">
        <x-input type='text' name='produc_name' label="Product Name" value="{{old('product_name')}}" id="product_name" />
        <x-input type='text' name='quantity' label="Quantity" id="quantity" />
        <x-input type='text' name='price' label="Price" id="Price" />

        <button type="button" class="btn btn-secondary">Submit</button>
    </form>

</div>
@endsection