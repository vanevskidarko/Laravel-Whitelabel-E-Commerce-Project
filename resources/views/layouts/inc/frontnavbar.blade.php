@php
use Illuminate\Support\Facades\Auth;
@endphp
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container px-4">
    <a class="navbar-brand" href="{{'/'}}">Ecommerce</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        @if (Auth::check())
        <li class="nav-item">
          <a class="nav-link" href="{{url('category')}}">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('cart')}}">Cart</a>
        </li>
        @if(Auth::check() && Auth::user()->role  == "1")
        <li class="nav-item">
          <a class="nav-link" href="{{url('categories')}}">Dashboard</a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="{{url('wishlist')}}">Wishlist</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('my-orders')}}">My Orders</a>
        </li>
        @endif
        
        @guest
          @if (Route::has('login'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">{{__('Login')}}</a>
          </li>
            
          @endif
          @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{route('register')}}">{{__('Register')}}</a>
            </li>
          @endif
          @else
        @endguest
      </ul>
    </div>
  </div>
    
  </nav>