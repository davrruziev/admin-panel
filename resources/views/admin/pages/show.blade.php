@extends('index')
@section('title')
    Pages
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Page ID -{{ $page->id }}</h4>
                    <div class="card-header-form">
                        <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">

                            <tr>
                                <th>ID</th>
                                <td>{{ $page->id }}</td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>{{ $page->title }}</td>
                            </tr>
                            <tr>
                                <th>Short_content</th>
                                <td>{{ $page->short_content }}</td>
                            </tr>
                            <tr>
                                <th>Description</th><td>{!! $page->description !!}</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
