@extends('index')

@section('content')

    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">

            <div class="card-header">
                <h4>Category Edit</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name_uz</label>
                        <input type="text" name="name" value="{{ $category->name }}" class="form-control  @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                        <img src="/site/images/categories/{{ $category->image }}" width="150" srcset="">
                        @error('image') <div class="invalid-feedback"> {{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label>Short_Content</label>
                        <input type="text" name="short_content" value="{{ $category->short_content }}" class="form-control @error('short_content') is-invalid @enderror">
                        @error('short_content')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" value="{{ $category->description }}" class="form-control @error('description') is-invalid @enderror">
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    </div>
                </form>

            </div>

        </div>
    </div>

@endsection
