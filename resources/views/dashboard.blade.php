@extends('layout.layout')

@section('section')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <h4>Welcome {{Auth::user()->name}}</h4>
        </div>
    </div>

</div>
@endsection