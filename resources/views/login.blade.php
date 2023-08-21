@extends('layout.layout')

@section('section')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <h3>@lang('messages.userlogin')</h3>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="email">
                        @error('email')
                            <span class="">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        @error('password')
                            <span class="">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div> -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
@endsection
