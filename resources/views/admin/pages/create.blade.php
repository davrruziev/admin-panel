@extends('index')

@section('title')
    Create Pages
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{ route('admin.pages.store') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>Create Page</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
                            @error('title')
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
                            <textarea type="text" name="description"
                                      class="form-control ckeditor @error('description') is-invalid @enderror"></textarea>
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

@section('js')
    <script src="/admin/ckeditor/ckeditor.js"></script>
    <script>
        $('.ckeditor').ckeditor();
    </script>
@endsection
