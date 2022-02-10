@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Add a product category</h4>
    </div>
    <div class="card-body">
        <h1>
            <form action="{{url('insert-category')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="col-md-6">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" name="slug">
                    </div>
                    <div class="col-md-12">
                        <textarea name="description" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="status">Status</label>
                        <input type="checkbox"  name="status">
                    </div>
                    <div class="col-md-6">
                        <label for="popular">Popular</label>
                        <input type="checkbox"  name="popular">
                    </div>
                    <div class="col-md-12">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title">
                    </div>
                    <div class="col-md-12">
                        <label for="meta_description">Meta Description</label>
                        <input type="text" class="form-control" name="meta_description">
                    </div>
                    <div class="col-md-12">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input type="text" class="form-control" name="meta_keywords">
                    </div>
                    <div class="col-md-12">
                        <input type="file" class="form-control" name="image" id="">
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </h1>
    </div>
</div>

@endsection