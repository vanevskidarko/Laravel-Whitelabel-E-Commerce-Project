@extends('layouts.front')
@section('title')
    E-commerce Site
@endsection

@section('content')
@include('layouts.inc.hero')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>
                Trending products

            </h2>
            <div class="owl-carousel owl-theme">
                @foreach ($featured_products as $product )
                    <div class="item">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" style="width: 100%;height: 15vw; object-fit: cover;" src="{{asset('assets/uploads/products/'.$product->image)}}" alt="Card image cap">
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
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Trending Categories</h2>
            <div class="owl-carousel owl-theme">
                @foreach ($trending_categories as $category )
                <div class="item">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" style="width: 100%;height: 15vw; object-fit: cover;" src="{{asset('assets/uploads/category/'.$category->image)}}" alt="Card image cap">
                        <div class="card-body">
                          <h4 class="card-text">{{$category->name}}</h4>
                          <span>{{$category->description}}</span>
                        </div>
                      </div>
                </div>                   
                @endforeach
            </div>
            

        </div>
    </div>
</div>

@section('scripts')
<script>
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3 
        }
    }
})
</script>

@endsection

@endsection