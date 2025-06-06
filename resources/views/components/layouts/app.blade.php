<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />

    <!-- fontAwesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />

    <!-- boxicons -->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />

    <!-- main stylesheet -->
    <link rel="stylesheet" href="{{asset('theme_asset/home/css/home.css')}}" />

    <!-- title -->
    <title>{{$tittle ?? "Vedic-Collections"}}</title>
    @livewireStyles
  </head>

  <body>
    <!-- header -->
    <div id="header">
      <div class="container">
        <div class="nav-bar">
          <a href="{{route('products.browse')}}" >
            <h1 class="text-warning"><b>Vedic Collections</b></h1>
          </a>

          <div class="d-flex align-items-center">
            <a href="{{route('cart')}}">
            <div class="theme-wrap me-3">
              <div class="theme-icon-wrap">
                <i class="fa-solid fa-cart-shopping"></i>
              </div>
            </div>
            </a>
          </div>
        </div>

        <div class="navmenus">
          <div class="nav-links">
            <a href="{{route('products.browse')}}">Home</a>
            <div class="dropdown">
              <a
                href="#!"
                class="dropdown-toggle"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                >Categories</a
              >
              @php
                  $categories = App\Models\category::all();
              @endphp
              <ul class="dropdown-menu">
                @foreach ($categories as $category)
                <li><a class="dropdown-item" href="{{route('category.show',$category->id)}}">{{$category->name}}</a></li>   
                @endforeach
                
              </ul>
            </div>
            @auth
            <a href="{{route('cart')}}">Cart</a>
            <form action="{{route('logout')}}" method="POST">
              @csrf
              <button class="btn btn-outline-danger" type="submit">Logout</button>
            </form>
            @else
            <a class="mr-2" href="{{route('login')}}">Login</a>
            <a href="{{route('register')}}">Register</a>
            @endauth
            
          </div>
          <div class="nav-toggler">
            <i class="bx bx-menu-alt-right"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
        {{$slot}}
    </div>

    <!-- footer -->
    <footer id="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <a href="#!" class="logo">
              <h1 class="text-warning"><b>Vedic Collections</b></h1>
            </a>

            <p class="footer-desc">
              Bringing divinity home, one sacred item at a time.
            </p>
          </div>

          <div class="col-lg-3 mb-5 mb-lg-0">
            <ul class="footer-list">
              <h2 class="title">Categories</h2>
              @foreach ($categories as $category)
                <li><a  href="{{route('category.show',$category->id)}}">{{$category->name}}</a></li>   
                @endforeach
            </ul>
          </div>

          <div class="col-lg-3 mb-5">
            <ul class="footer-list">
              <h2 class="title">Legals</h2>
              <li><a href="#!">Contact</a></li>
              <li><a href="#!">Privacy policy</a></li>
              <li><a href="#!">Cookie policy</a></li>
              <li><a href="#!">Terms &amp; Conditions</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <div class="backdrop-filter"></div>
  </body>

  <!-- js -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('theme_asset/home/js/home.js')}}"></script>
  @livewireScripts
</html>
