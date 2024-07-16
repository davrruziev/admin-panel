@extends('index')

@section('content')

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                @if(session('success'))
                    <div class="alert alert-primary alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                <div class="card-header">
                    <h4>Category</h4>
                    <div class="card-header-form">
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Create</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tbody>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Short_Content</th>
                                <th>Description</th>
                            </tr>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <img alt="image" src="/site/images/categories/{{ $category->image }}"
                                             width="35">
                                    </td>
                                    <td>{{ $category->short_content }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                                           class="btn btn-info">Edit</a>
                                        <a href="{{ route('admin.categories.show', $category->id) }}"
                                           class="btn btn-success">Show</a>
                                        <form style="display: inline"
                                              action="{{ route('admin.categories.destroy', $category->id) }}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary"
                                            >Delete
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
                        {{ $categories->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>

@endsection
