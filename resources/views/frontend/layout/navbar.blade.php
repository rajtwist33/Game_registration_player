 <div class="container-fluid bg-white sticky-top">
     <div class="container">
         <nav class="navbar navbar-expand-lg bg-white navbar-light p-lg-0">
             <a href="{{ url('/') }}" class="navbar-brand d-lg-none">
                 <h3 class="fw-bold m-0"> {{ config('app.name') }}</h3>
             </a>
             <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                 data-bs-target="#navbarCollapse">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarCollapse">
                 <div class="navbar-nav">
                     <a href="{{ url('/') }}"
                         class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>

                     <a href="{{ route('about') }}"
                         class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">About</a>


                     <a href="{{ route('project') }}"
                         class="nav-item nav-link {{ Request::is('project') ? 'active' : '' }}">Blogs</a>

                     <a href="{{ route('team') }}"
                         class="nav-item nav-link {{ Request::is('team') ? 'active' : '' }}">Teams</a>

                     <a href="{{ route('client') }}"
                         class="nav-item nav-link  {{ Request::is('client') ? 'active' : '' }}">Members</a>
                     <a href="{{ route('contact') }}"
                         class="nav-item nav-link  {{ Request::is('contact') ? 'active' : '' }}">Contact</a>
                 </div>

             </div>
         </nav>
     </div>
 </div>
