@extends('layouts.front')
@section('title')
{{$category->name}}
@endsection
@section('content')
<div class="py-5">
<h3 class="text-center mb-5 pb-5">
    {{$category->name}}

</h3>
    <div class="container">
        <div class="row">
            <h2 class="text-center pb-5 pr-3">
            </h2>
           
                @foreach ($products as $product )
                    <div class="col-md-3 mb-3 mx-auto p-3">
                        <div class="card" style="width: 18rem;">
                            <a href="{{url('category/'.$category->slug.'/'.$product->name)}}">
                            <img class="card-img-top" style="width: 100%;height: 15vw; object-fit: cover;" src="{{asset('assets/uploads/products/'.$product->image)}}" alt="Card image cap">
                            <div class="card-body">
                              <h4 class="card-text">{{$product->name}}</h4>
                              <span>{{$product->selling_price}}</span>
                            </div>
                              </a>                    
                          </div>
                    </div>             
                @endforeach            

        </div>
    </div>
</div>
@endsection