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
                                       @php
                                        $total = 0;
                                       foreach ($cartItems as $item) {
                                           $total = $total + $item->products->selling_price*$item->product_qty;
                                       }
                                       echo $total;
                                       @endphp
                                @endforeach
                            </tbody>
                        </table>
                        @php
                            echo $total
                        @endphp
                        <h4 class="total my-1 text-center">Total:{{$total}}</h3>
                        <div id="paypal-button-container"></div>
                    </div>
                </div>
            </div>
        </div>
        </form>

</div>

<script>
    <script src="https://www.paypal.com/sdk/js?client-id=AUx3CYeK5Vwh8qbOGeQGqNBL35ykZybRZn-h_jAQrarERarxmN2se-JZvBI50T2RzKkWB36M61kAwt_v"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
    <script>

      paypal.Buttons({

        // Sets up the transaction when a payment button is clicked
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '{{$total}}' 
              }
            }]
          });
        },

        // Finalize the transaction after payer approval
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            var firstname = $('.firstname').val()
            var lastname = $('.lastname').val()
            var email = $('.email').val()
            var phone = $('.phone').val()
            var address1 = $('.address1').val()
            var address2 = $('.address2').val()
            var city = $('.city').val()
            var country = $('.country').val()
            var pincode = $('.pin').val()
            $.ajax({
               method: "POST",
               url:     '/place-order',
               data:{
                   'firstname': firstname,
                   'lastname':  lastname,
                   'email':     email,
                   'phone':     phone,
                   'address1':  address1,
                   'address2':  address2,
                   'city':  city,
                   'country':  country,
                   'pincode':  pincode,
                   'payment_mode': 'Paid by paypal',
                   'payment_id': details_id
               },
               success:function(response){
                   swal(response.status)
                   window.location.href = '/my-orders'
               }
           })
          });
        }
      }).render('#paypal-button-container');
</script>
@endsection

