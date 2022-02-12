@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Add a product</h4>
    </div>
    <div class="card-body">
        <h1>
            <form action="{{url('insert-product')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select name="category_id" id="" class="form-select">
                            <option value="">Select a Category</option>
                            @foreach ($category as $item )
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-12">
                        <label for="small_description">Small description</label>
                        <textarea name="small_description" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="original_price">Original Price</label>
                        <input type="number" class="form-control"  name="original_price">
                    </div>
                    <div class="col-md-6">
                        <label for="selling_price">Selling Price</label>
                        <input type="number" class="form-control" name="selling_price">
                    </div>
                    <div class="col-md-6">
                        <label for="tax">Tax</label>
                        <input type="number" class="form-control" name="tax">
                    </div>
                    <div class="col-md-6">
                        <label for="qty">Quantity</label>
                        <input type="number" class="form-control" name="qty">
                    </div>

                    <div class="col-md-6">
                        <label for="status">Status</label>
                        <input type="checkbox"  name="status">
                    </div>

                    <div class="col-md-6">
                        <label for="trending">Trending</label>
                        <input type="checkbox"  name="trending">
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