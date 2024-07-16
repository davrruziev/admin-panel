@extends('index')

@section('content')

    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">

            <div class="card-header">
                <h4>Category ID {{ $category->id }}</h4>
                <div class="card-header-form">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <td>{{ $category->id }}</td>
                        </tr>
                        <tr>
                            <th>Name Uz</th>
                            <td>{{ $category->name }}</td>
                        </tr>
                        <tr>
                            <th>Image</th> <td><img src="/site/images/categories/{{ $category->image }}" width="150" alt="" srcset=""></td>
                        </tr>
                        <tr>
                            <th>Slug</th>  <td>{{ $category->short_content }}</td>
                        </tr>
                        <tr>
                            <th>Mate Description</th>  <td>{{ $category->description }}</td>
                        </tr>
                    </table>
                </div>

            </div>

        </div>
    </div>

@endsection
