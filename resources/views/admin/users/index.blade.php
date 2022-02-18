@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Registered Users
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Zip Code</th>
                <th>City</th>
                <th>Country</th>
            </thead>
            <tbody>
                @foreach ($users as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->pincode}}</td>
                    <td>{{$item->city}}</td>
                    <td>{{$item->country}}</td>
                </tr> 
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>

@endsection