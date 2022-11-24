<header class="navbar navbar-dark navbar-expand-lg sticky-top bg-primary flex-md-nowrap p-0 shadow">
   <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-5" href="/dashboard"><strong>My Blog</strong></a>
   <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
   </button>
   <input class="form-control form-control-light w-25 py-1 rounded ms-2 me-auto" type="text" placeholder="Search"
      aria-label="Search">

   <div class="container-fluid">
      <div class="collapse navbar-collapse" id="sidebarMenu">
         <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                  aria-expanded="false">{{ auth()->user()->name }}</a>
               <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/"><span data-feather="home"></span> Home</a></li>
                  <li>
                     <hr class="dropdown-divider">
                  </li>
                  <li>
                     <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"><span data-feather="log-out"></span>
                           Logout</button>
                     </form>
                  </li>
               </ul>
            </li>
         </ul>
      </div>
   </div>

</header>
