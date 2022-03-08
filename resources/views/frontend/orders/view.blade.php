@extends('layouts.front')

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
                    <h3>Total: ${{$orders->total_price}} <span class="float-right">Paid by Paypal</span> </h3>
                        </div>
                    </div>

                </div>
            </div>
           
        </div>
    </div>
</div>

@endsection