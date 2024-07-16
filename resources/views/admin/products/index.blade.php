@extends('index')
@section('title')
    Product
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
                    <h4>Products</h4>
                    <div class="card-header-form">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-info">Create</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                            <tr>
                                <th class="text-center">
                                    T/R
                                </th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Short_content</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td class="align-middle">
                                        {{ $product->category->name ?? ''}}
                                    </td>
                                    <td>
                                        <img alt="image" src="/site/images/products/{{ $product->image }}" width="35">
                                    </td>
                                    <td>{{ $product->short_content }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        <a href="{{ route('admin.products.show', $product->id) }}"
                                           class="btn btn-primary">View</a>
                                        <a href="{{ route('admin.products.edit', $product->id) }}"
                                           class="btn btn-info">Edit</a>
                                        <form style="display: inline"
                                              action="{{ route('admin.products.destroy', $product->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
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
             {{ $products->links() }}
          </nav>
        </div>
            </div>
        </div>
    </div>
@endsection

