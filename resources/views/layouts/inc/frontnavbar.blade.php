<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="{{'/'}}">Ecommerce</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('category')}}">Category</a>
        </li>
        @guest
          @if (Route::has('login'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">{{__('Login')}}</a>
          </li>
            
          @endif
          @if (Route::has('regiser'))
            <li class="nav-item">
              <a class="nav-link" href="{{route('register')}}">{{__('Login')}}</a>
            </li>
          @endif
        @endguest
      </ul>
    </div>
  </nav>