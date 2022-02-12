@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Products Page
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <th>ID</th>
                <th>Category</th>
                <th>Name</th>
                <th>Description</th>
                <th>Original Price</th>
                <th>Selling Price</th>
                <th>Image</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($products as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->category->name}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->small_description}}</td>
                    <td>{{$item->original_price}}</td>
                    <td>{{$item->selling_price}}</td>
                    <td><img src="{{ asset('assets/uploads/products/'.$item->image)}}" class="w-25"></td>
                    <td>
                        <a href="{{url('edit-product/'.$item->id) }}"  class="btn btn-primary">Edit</a>
                        <a href="{{url('delete-product/'.$item->id) }}"  class="btn btn-danger">Delete</a>
                        </td>
                </tr> 
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>

@endsection