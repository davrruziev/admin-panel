@extends('index')
@section('title')
    Pages
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                <div class="card-header">
                    <h4>Pages</h4>
                    <div class="card-header-form">
                        <a href="{{ route('admin.pages.create') }}" class="btn btn-info">Create</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tbody>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Short_Content</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($pages as $page)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $page->title }}</td>
                                    <td>{{ $page->short_content }}</td>
                                    <td>{!! $page->description !!}</td>
                                    <td>
                                        <a href="{{ route('admin.pages.edit', $page->id) }}"
                                           class="btn btn-info">Edit</a>
                                        <a href="{{ route('admin.pages.show', $page->id) }}"
                                           class="btn btn-primary">View</a>
                                        <form style="display: inline"
                                              action="{{ route('admin.pages.destroy', $page->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        {{ $pages->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
