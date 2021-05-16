@extends('admin.layout.index')


@section('content')
    <div class="col-10 row justify-content-center">
        <div class="card col-4">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Login</h4>
                <p class="card-category">Welcome back</p>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('login') }}">
                    @csrf

                    <div class="row mt-4">
                        <div class="col">
                            <div class="form-group">
                                <label for="username" class="bmd-label-floating">Username</label>
                                <input id="username" name="username" type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <div class="form-group">
                                <label class="bmd-label-floating" for="password">
                                    Password
                                </label>
                                <input id="password" name="password" type="password" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <div class="text-danger font-weight-bold">
                                    {{ $error }}
                                </div>
                            @endforeach

                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary pull-right mt-4 mb-4 w-100">Create Post</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
@endsection
