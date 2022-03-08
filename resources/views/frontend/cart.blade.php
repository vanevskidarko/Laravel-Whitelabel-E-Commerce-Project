@extends('layouts.front')
@section('title')
    Cart
@endsection

@section('content')

<div class="py-3 mb-4 shadow-lg bg-warning border-top">
    <div class="container">
        <h6 class="">
            <a href="{{url('/')}}">
                Home
            </a>/
            <a href="{{url('cart')}}">
                Cart
            </a>
        </h6>
    </div>

</div>
@php
    $total = 0;
@endphp
<div class="container">
    <div class="card shadow-lg p-3 mb-5 bg-white rounded">
        <div class="card-body">
            @foreach($cartItem as $item)
            <div class="row product_data">
                <div class="col-md-2">
                    <img src="{{asset('assets/uploads/products/'.$item->products->image)}}" height="60px" width="60px" alt="">
                </div>
                <div class="col-md-5">
                    <h6>{{$item->products->name}}</h6>
                </div>
                
                <div class="col-md-3">
                    <input type="hidden" name="product_id" class="product_id" value="{{$item->product_id}}">
                    <label for="quantity">
                        Quantity
                    </label>
                    <div class="input-group text-center mb-3">
                        <button class="input-group-text changeQuantity decrement-btn">-</button>
                        <input type="text" name="quantity" class="form-control text-center qty " value="{{$item->product_qty}}">
                        <button class="input-group-text changeQuantity increment-btn">+</button>
                    </div>
                    <div class="col-md-4">
                        <h6 class="inline">${{$item->products->selling_price}}</h6>
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-danger delete-cart-item"> <i class="fa fa-trash"></i>Remove</button>
                </div>
            </div>
            @php
            $total += $item->products->selling_price * $item->product_qty;
            @endphp
            @endforeach

            <div class="card-footer">
                <h6>Total Price: ${{$total}}</h6>
                <a href="{{url('checkout')}}" class="btn btn-success">Proceed To Checkout</a>
            </div>
        </div>
    </div>
</div>



@section('scripts')
<script>

$.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.increment-btn').click(function(e){
            e.preventDefault();

            var inc_value = $(this).closest('.product_data').find('.qty').val();
            var value = parseInt(inc_value,10);
            value = isNaN(value) ? 0 : value;
            if(value < 10){
                value++;
                $(this).closest('.product_data').find('.qty').val(value)
            }
        }),

        $('.decrement-btn').click(function(e){
            e.preventDefault();

            var dec_value = $(this).closest('.product_data').find('.qty').val();
            var value = parseInt(dec_value,10);
            value = isNaN(value) ? 0 : value;
            if(value > 1){
                value--;
                $(this).closest('.product_data').find('.qty').val(value)
            }
        }),

        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

        $('.changeQuantity').click(function(e){
            e.preventDefault();

            var product_id = $(this).closest('.product_data').find('.product_id').val();
            var qty = $(this).closest('.product_data').find('.qty').val();
            $.ajax({
                method: "POST",
                url: 'update-cart',
                data: {
                    'product_id': product_id,
                    'qty': qty,
                },
                success: function(response){
                    window.location.reload()
                }
            })
        })

        $('.delete-cart-item').click(function(e){
            e.preventDefault();

            var product_id = $(this).closest('.product_data').find('.product_id').val();

            $.ajax({
                method: "POST",
                url: 'delete-cart-items',
                data: {
                    'product_id': product_id,
                },
                success: function(response){
                    window.location.reload()
                    swal("",response.status,"success");
                }
            })
        })
</script>
@endsection

<style>
    a {
        text-decoration: none;
        color: black;
    }
</style>
@endsection