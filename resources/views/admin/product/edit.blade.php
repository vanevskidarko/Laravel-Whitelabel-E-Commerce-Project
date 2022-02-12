@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Edit a product</h4>
    </div>
    <div class="card-body">
        <h1>
            <form action="{{url('update-product/'.$products->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select name="{{}}"  id="" class="form-select">
                            <option value="">{{$products->category->name}}</option>
                           
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" value="{{$products->name}}" name="name">
                    </div>
                    <div class="col-md-12">
                        <label for="small_description">Small description</label>
                        <textarea name="small_description" rows="5"  class="form-control">{{$products->small_description}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="original_price">Original Price</label>
                        <input type="number" value="{{$products->original_price}}" class="form-control"  name="original_price">
                    </div>
                    <div class="col-md-6">
                        <label for="selling_price">Selling Price</label>
                        <input type="number" value="{{$products->selling_price}}" class="form-control" name="selling_price">
                    </div>
                    <div class="col-md-6">
                        <label for="tax">Tax</label>
                        <input type="number" value="{{$products->tax}}" class="form-control" name="tax">
                    </div>
                    <div class="col-md-6">
                        <label for="qty">Quantity</label>
                        <input type="number" value="{{$products->qty}}" class="form-control" name="qty">
                    </div>

                    <div class="col-md-6">
                        <label for="status">Status</label>
                        <input type="checkbox" {{$products->status ? 'checked':''}}  name="status">
                    </div>

                    <div class="col-md-6">
                        <label for="trending">Trending</label>
                        <input type="checkbox"  {{$products->trending ? 'checked':''}} name="trending">
                    </div>

                    <div class="col-md-12">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" value="{{$products->meta_title}}" class="form-control" name="meta_title">
                    </div>
                    <div class="col-md-12">
                        <label for="meta_description">Meta Description</label>
                        <input type="text" value="{{$products->meta_description}}" class="form-control" name="meta_description">
                    </div>
                    <div class="col-md-12">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input type="text" value="{{$products->meta_keywords}}" class="form-control" name="meta_keywords">
                    </div>
                    @if ($products->image)
                        <img src="{{asset('assets/uploads/products/'.$products->image)}}" alt="">
                    @endif
                    <div class="col-md-12">
                        <input type="file" class="form-control" name="image" id="">
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </h1>
    </div>
</div>

@endsection