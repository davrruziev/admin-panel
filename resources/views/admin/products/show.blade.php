@extends('index')
@section('title')
    Product
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Post ID -{{ $product->id }}</h4>
                    <div class="card-header-form">
                        <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">

                            <tr>
                                <th>ID</th>
                                <td>{{ $product->id }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th>Category</th><td>{{ $product->category->name }}</td>
                            </tr>
                            <tr>
                                <th>Image</th> <td><img src="/site/images/posts/{{ $product->image }}" width="150" alt="" srcset=""></td>
                            </tr>
                            <tr>
                                <th>Short_content</th><td>{{ $product->short_content }}</td>
                            </tr>
                            <tr>
                                <th>Description</th><td>{{ $product->description }}</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
