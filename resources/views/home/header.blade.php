<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
             
                <li class="nav-item">
                   <a class="nav-link" href="{{route('ourproducts')}}">Products</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{route('blog')}}">Blog</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{route('contact')}}">Contact</a>
                </li>

                @if (Route::has('login'))
                @auth

                <li class="nav-item">
                  <div class="scroll-to-section"><a href="{{route('showCart', Auth::user()->id)}}"><i class="fa fa-shopping-cart"></i> Cart <span class="badge"></span>
                  </a>
                  {{-- <a class="nav-link" href="{{route('showCart')}}">Cart</a> --}}
               </div>
               </li>

                <li class="nav-item">
                    <x-app-layout>
 
                    </x-app-layout>
                 </li>
                @else

                <li class="nav-item">
                   
                   <a href="{{route('login')}}" <button type="button" class="btn btn-success">LogIN</button></a>
                </li>
                   @if (Route::has('register'))
                <li class="nav-item">
                   
                   <a href="{{route('register')}}" <button type="button" class="btn btn-">Register</button></a>
                </li>
                   @endif
                @endauth

                @endif

               
                <form class="form-inline">
                   <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                   <i class="fa fa-search" aria-hidden="true"></i>
                   </button>
                </form>
             </ul>
          </div>
       </nav>
    </div>
 </header>