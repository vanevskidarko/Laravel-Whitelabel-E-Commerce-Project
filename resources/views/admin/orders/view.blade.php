@extends('layouts.admin')

@section('title')
My Orders
@endsection

@section('content')
<div class="container py-5 my-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Order View</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="firstname">First Name</label>
                            <div class="border p-2">{{$orders->first_name}}</div>

                            <label for="lastname">Last Name</label>
                            <div class="border p-2">{{$orders->last_name}}</div>

                            <label for="">Email</label>
                            <div class="border p-2">{{$orders->email}}</div>

                            <label for="">Contact Phone</label>
                            <div class="border p-2">{{$orders->phone}}</div>

                            
                            <label for="">Shipping Address</label>
                            <div class="border p-2">{{$orders->address1}}, {{$orders->address2}}, {{$orders->city}}, {{$orders->country}}</div>
                            
                            <label for="">Zip Code</label>
                            <div class="border p-2">{{$orders->pincode}}</div>
                        </div>
                        <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders->orderItems as $item)
                                <tr>
                                    <td>{{$item->products['name']}}</td>
                                    <td>{{$item->qty}}</td>
                                    <td>{{$item->price * $item->qty}}</td>
                                    <td><img src="{{asset('assets/uploads/products/'.$item->products->image)}}" class="img-thumb" width="100px" alt=""></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>  
                    <h3 class="float-right">Total: {{$orders->total_price}}</h3>
                    <form action="{{url('update-order/'.$orders->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="">Order Status</label>
                        <select name="order_status" class="form-select" id="">
                            <option {{$orders->status == '0'?'selected':''}} value="0">Pending</option>
                            <option {{$orders->status == '1'?'selected':''}} value="1">Completed</option>
                        </select>
                        <button type="submit" class="btn btn-secondary mt-1">Update</button>
                    </form>

                        </div>
                    </div>

                </div>
            </div>
           
        </div>
    </div>
</div>

@endsection