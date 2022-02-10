@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Category Page
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($category as $item)
                    
                @endforeach
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td><img src="{{ asset('assets/uploads/category/'.$item->image)}}" class="w-25"></td>
                    <td>
                        <a href="{{url('edit-product/'.$item->id) }}"  class="btn btn-primary">Edit</a>
                        <a href="{{url('edit-product/'.$item->id) }}"  class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection