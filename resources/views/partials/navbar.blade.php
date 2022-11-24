<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
   <div class="container-fluid">
      <a class="navbar-brand" href="/"> <b>My Blog</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
               <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link {{ Request::is('post*') ? 'active' : '' }}" href="/post">Blog</a>
            </li>
            <li class="nav-item">
               <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}" href="/categories">Category</a>
            </li>
            <li class="nav-item">
               <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About</a>
            </li>
         </ul>

         <ul class="navbar-nav ms-auto">
            @auth
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                     aria-expanded="false">{{ auth()->user()->name }}</a>
                  <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-house"></i> Dashboard</a></li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li>
                        <form action="/logout" method="POST">
                           @csrf
                           <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                              Logout</button>
                        </form>
                     </li>
                  </ul>
               </li>
            @else
               <li class="nav-item">
                  <a href="/login" class="nav-link {{ Request::is('*login*') ? 'active' : '' }}"><i
                        class="bi bi-box-arrow-in-right"></i> Login</a>
               </li>
            @endauth
         </ul>

      </div>
   </div>
</nav>
