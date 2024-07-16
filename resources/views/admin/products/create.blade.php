@extends('index')

@section('title')
    Create Posts
@endsection

@section('content')
    <div class="row">
        @foreach ($errors->all() as $error )
            {{ $error }}
        @endforeach
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>Create Product</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <div class="invalid-feedback"> {{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                            <div class="invalid-feedback"> {{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" id="" class="form-control  @error('category') is-invalid @enderror">
                                <option value="">Select category</option>
                                @foreach ( $categories as $category )
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="invalid-feedback"> {{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Short_Content</label>
                            <input type="text" name="short_content"
                                   class="form-control @error('short_content') is-invalid @enderror">
                            @error('short_content')
                            <div class="invalid-feedback"> {{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description"
                                   class="form-control @error('description') is-invalid @enderror">
                            @error('description')
                            <div class="invalid-feedback"> {{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

