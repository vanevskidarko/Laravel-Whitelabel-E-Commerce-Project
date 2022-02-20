@extends('layouts.front')
@section('title')
Wishlist
@endsection

@section('content')

<div class="py-3 mb-4 shadow-lg bg-warning border-top">
    <div class="container">
        <h6 class="">
            <a href="{{url('/')}}">
                Home
            </a>/
            <a href="{{url('wishlist')}}">
                Wishlist
            </a>
        </h6>
    </div>

</div>
@php
    $total = 0;
@endphp
<div class="container">
    <div class="card shadow-lg p-3 mb-5 bg-white rounded">
        @if ($wishlist->count() > 0)
        <div class="card-body">
            @foreach($wishlist as $item)
            <div class="row product_data">
                <div class="col-md-2">
                    <img src="{{asset('assets/uploads/products/'.$item->products->image)}}" height="60px" width="60px" alt="">
                </div>
                <div class="col-md-2 my-auto">
                    <h6>{{$item->products->name}}</h6>
                </div>

                <div class="col-md-2 my-auto">
                    <h6>${{$item->products->selling_price}}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <input type="hidden" name="product_id" class="product_id" value="{{$item->product_id}}">
                    <input type="hidden" name="quantity" class="product_quantity qty" value="1">
                    @if($item->products->qty >= $item->product_quantity)
                    <h6>In Stock</h6>
                    @else
                    <h6>Out of Stock</h6>
                    @endif
                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-success addToCart"> <i class="fa fa-shopping-cart"></i>Add To Cart</button>

                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-danger delete-wishlist-item"> <i class="fa fa-trash"></i>Remove</button>
                </div>
            </div>
            @php
            $total += $item->products->selling_price * $item->product_qty;
            @endphp
            @endforeach
        </div>
            @else
            <h4 class="text-center">There are no wishlist items</h4>
        @endif
    </div>
</div>



@section('scripts')
<script>

$.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('.addToCart').click(function(e){
            e.preventDefault;

            var product_id = $(this).closest('.product_data').find('.product_id').val();
            var product_quantity = $(this).closest('.product_data').find('.qty').val();
            

            $.ajax({
                method: 'POST',
                url:    '/add-to-cart',
                data:   {
                    'product_id'    : product_id,
                    'product_qty'   :product_quantity
                },
                success: (response)=>{
                   swal(response.status)
                }
            })
        })


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
        }),

        $('.delete-wishlist-item').click(function(e){
            e.preventDefault();

            var product_id = $(this).closest('.product_data').find('.product_id').val();

            $.ajax({
                method: "POST",
                url: 'delete-wishlist-items',
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