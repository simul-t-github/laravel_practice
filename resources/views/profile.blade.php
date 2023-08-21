@extends('layout.layout')

@section('section')
<div class="container pt-5">
    <form class="row g-3" action="{{route('user.update')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$user->id}}">
        <div class="col-md-12">
            <label for="name" class="form-label">First name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
            @error('name')
            <span class="">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12">
            <label for="email" class="form-label">Email</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend" value="{{$user->email}}">
                @error('email')
                <span class="">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="">
            @error('password')
            <span class="">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-12">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="">
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>
@endsection