@extends('layouts.front')
@section('title')
    E-commerce Categories
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach ($category as $item)
                    <div class="col-md mb-2">
                        <a href="{{url('view-category/'.$item->slug)}}">
                            <div class="card">
                                <img src="{{asset('assets/uploads/category/'.$item->image)}}" width="400px" alt="">
                                <div class="card-body">
                                    <h5>{{$item->name}}</h5>
                                    <p>{{$item->small_description}}</p>
                                </div>
                            </div>
                        </a>
                        
                    </div>
                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection