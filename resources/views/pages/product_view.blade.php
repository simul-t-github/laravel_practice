@extends('layout.layout')
@section('title')
    Product View
@stop

@section('section')
    @if (session()->has('status'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong> {{ session()->get('status') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">

        <div class="col-6">
            <a href="{{ Route('product.trash') }}" class="btn btn-danger my-4">Go To Trash</a>
        </div>
        <div class="col-6">
            <a href="{{ Route('product.create') }}" class="btn btn-primary my-4 float-end">Add Product</a>
        </div>

        <div class="my-2">
            <form action="">
                <div class="row">
                    <div class="col-9 form-group mb-3">
                        <input type="search" name="search" class="form-control" placeholder="Search with email or name"
                            value="{{ $search }}">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-secondary" type="submit">Search</button>
                        <a href="{{ route('product.view') }}">
                            <button class="btn btn-primary" type="button">Reset</button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <table class="table table-light table-bordered">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Price</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $sr = 1; ?>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $sr++ }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td><img src="{{ asset($product->image) }}" alt="" height="80px" width="80px"
                            class="rounded-circle"></td>
                    <td>{{ $product->price }}</td>
                    <td>{{ d_format('d M Y h:i A', $product->created_at) }}</td>
                    <td>
                        <a href="{{ Route('product.edit', ['id' => $product->id]) }}" class="btn btn-success">Edit</a>
                        <a href="{{ Route('product.delete', ['id' => $product->id]) }}" class="btn btn-primary">Trash</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <div class="row">
        @if (isset($_GET['search']) == '')
            {{ $products->links() }}
        @endif
    </div>

@stop
