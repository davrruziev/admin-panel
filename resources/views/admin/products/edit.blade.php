@extends('index')

@section('css')
    <link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
@endsection

@section('title')
    Edit Product
@endsection

@section('content')
    <div class="row">
        @foreach ($errors->all() as $error )
            {{ $error }}
        @endforeach
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{ route('admin.products.update',$product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Product</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $product->name }}" class="form-control @error('name') is-invalid @enderror">
                            @error('name') <div class="invalid-feedback"> {{ $message }}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            <img src="/site/images/products/{{ $product->image }}" width="150" srcset="">
                            @error('image') <div class="invalid-feedback"> {{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" id="" class="form-control">
                                <option value="">Select category</option>
                                @foreach ( $categories as $category )
                                    <option {{ $product->category_id==$category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Short_Content</label>
                            <input type="text" name="short_content" value="{{ $product->short_content }}" class="form-control @error('short_content') is-invalid @enderror">
                            @error('short_content') <div class="invalid-feedback"> {{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" value="{{ $product->description }}" class="form-control @error('description') is-invalid @enderror">
                            @error('description') <div class="invalid-feedback"> {{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

