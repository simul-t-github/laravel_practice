@extends('layout.layout')
@section('title')
    Product Trash List
@stop
@section('section')
    @if (session()->has('status'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong> {{ session()->get('status') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a href="{{ Route('product.view') }}" class="btn btn-primary my-4 float-end">Go To Product List</a>
    <table class="table table-light table-bordered">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ d_format('d M Y h:i A', $product->created_at) }}</td>
                    <td>
                        <a href="{{ Route('product.restore', ['id' => $product->id]) }}" class="btn btn-warning">Restore</a>
                        <a href="{{ Route('product.force.delete', ['id' => $product->id]) }}"
                            class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
