@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Edit a product category</h4>
    </div>
    <div class="card-body">
        <h1>
            <form action="{{url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Name</label>
                        <input type="text" value="{{$category->name}}" class="form-control" name="name">
                    </div>

                    <div class="col-md-6">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" value="{{$category->slug}}" name="slug">
                    </div>
                    <div class="col-md-12">
                        <label for="description">Description</label>
                        <textarea name="description" rows="5"  class="form-control">{{$category->description}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="status">Status</label>
                        <input type="checkbox"  name="status" {{$category->status == "1" ? 'checked': ''}}>
                    </div>
                    <div class="col-md-6">
                        <label for="popular">Popular</label>
                        <input type="checkbox"  name="popular" {{$category->popular == '1' ? 'checked' : ''}}>
                    </div>
                    <div class="col-md-12">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control"  value="{{$category->meta_title}}" name="meta_title">
                    </div>
                    <div class="col-md-12">
                        <label for="meta_description">Meta Description</label>
                        <input type="text" class="form-control"  value="{{$category->meta_description}}" name="meta_description">
                    </div>
                    <div class="col-md-12">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input type="text" class="form-control" name="meta_keywords" value="{{$category->meta_keywords}}">
                    </div>
                    @if ($category->image)
                    <img class="w-25" src="{{asset('assets/uploads/category/'.$category->image)}}" alt="">
                    @endif
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