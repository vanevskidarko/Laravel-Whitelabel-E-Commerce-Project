@extends('layouts.front')
@section('title')
Checkout
@endsection


@section('content')
<div class="container mt-5 pt-5">
    <form action="{{url('place-order')}}" method="POST">
        @csrf
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Basic Shipment Details</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="firstname">First Name</label>
                            <input class="form-control" type="text" name="firstname" id="">
                        </div>
                        <div class="col-md-6">
                            <label for="lastname">Last Name</label>
                            <input class="form-control" type="text" name="lastname" id="">
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="">
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Phone Number</label>
                            <input class="form-control" type="tel" name="phone" id="">
                        </div>
                        <div class="col-md-6">
                            <label for="address1">Address 1</label>
                            <input class="form-control" type="text" name="address1" id="">
                        </div>
                        <div class="col-md-6">
                            <label for="address2">Address 2</label>
                            <input class="form-control" type="text" name="address2" id="">
                        </div>
                        <div class="col-md-6">
                            <label for="country">Country</label>
                            <input class="form-control" type="text" name="country" id="">
                        </div>
                        <div class="col-md-6">
                            <label for="city">City</label>
                            <input class="form-control" type="text" name="city" id="">
                        </div>
                        <div class="col-md-6">
                            <label for="pin">PIN</label>
                            <input class="form-control" type="text" name="pin" id="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        Order Details
                        <hr>
                        <table class="table table-striped">
                            <thead>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td>{{$item->products->name}}</td>
                                        <td>{{$item->product_qty}}</td>
                                        <td>${{$item->products->selling_price}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary float-right">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
        </form>

</div>
@endsection