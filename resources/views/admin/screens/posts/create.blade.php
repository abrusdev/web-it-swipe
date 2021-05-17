@extends('admin.layout.index')

@section('content')
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Post</h4>
            <p class="card-category">Add new post</p>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('posts.create') }}" enctype="multipart/form-data">
                @csrf

                <div class="row mt-4">
                    <div class="col">
                        <div class="form-group">
                            <label for="title" class="bmd-label-floating">Title</label>
                            <input id="title" name="title" type="text" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating" for="slug">
                                Slug ( 1 - all, 2-design, 3-web, 4-game, 5-android, 6-ios )
                            </label>
                            <input id="slug" name="slug" type="number" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-group">
                                <label class="bmd-label-floating" for="description">Content</label>
                                <textarea id="description" name="description" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <input name="image" type="file" accept="image/png, image/gif, image/jpeg">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary pull-right">Create Post</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
@endsection
