@extends('layouts.front')
@section('title', $products->name)


@section('content')

<div class="container">
    <div class="row">


        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
            <div class="card">
                <img class="card-img" src="{{asset('assets/uploads/products/'.$products->image)}}" alt="Vans">
                <div class="card-body">
                    <h4 class="card-title">{{$products->name}}</h4>
                    <p class="card-text">
                        {{$products->small_description}} </p>
                    @if ($products->trending == '1')
                    <label class="bg-danger text-white btn">Trending</label>
                    @endif
                    <br>
                    <label for="qty">Quantity</label>
                    <input type="number" name="qty" id="">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="price text-success">
                            <h5 class="mt-4">${{$products->selling_price}}</h5>
                        </div>
                        <a href="#" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Add to
                            Cart</a>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
