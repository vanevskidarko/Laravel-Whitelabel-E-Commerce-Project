@extends('layouts.front')
@section('title')
{{$category->name}}
@endsection
@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>
                {{$category->name}}
            </h2>
                @foreach ($products as $product )
                <div class="col-md-3 mb-3">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset('assets/uploads/products/'.$product->image)}}" alt="Card image cap">
                        <div class="card-body">
                          <h4 class="card-text">{{$product->name}}</h4>
                          <span>{{$product->selling_price}}</span>
                        </div>
                      </div>
                </div>                   
                @endforeach            

        </div>
    </div>
</div>
@endsection