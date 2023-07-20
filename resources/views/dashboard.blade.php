<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title> Dashboard </title>
    <link rel="stylesheet" href="/style.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('assets/css/style1.css')}}">
    </head>
  <body>
    @csrf
    <div class="sidebar">
      <div class="logo-details">
        <i class="bx bxl-c-plus-plus"></i>
        <span class="logo_name">CodingLab</span>
      </div>
      <ul class="nav-links">
       <li>
          <a href="{{route('employees.index')}}">
            <i class="bx bx-box"></i>
            <span class="links_name">Employee</span>
          </a>
        </li>
        <li>
          <a href="{{route('products.index')}}">
            <i class="bx bx-box"></i>
            <span class="links_name">Products</span>
          </a>
        </li>
         <li>
          <a href="{{route('user.index')}}">
            <i class="bx bx-user"></i>
            <span class="links_name">User list</span>
          </a>
        </li>
         <li>
          <a href="{{route('category.index')}}">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Category</span>
          </a>
        </li>
        <li>
          <a href="{{route('subcategory.index')}}">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Subcategory</span>
          </a>
        </li>
        {{-- <li>
          <a href="#">
            <i class="bx bx-heart"></i>
            <span class="links_name">Favrorites</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-cog"></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
        --}}  
      </ul>
    </div>
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Dashboard</span>
        </div>
        {{-- <div class="search-box">
          <input type="text" placeholder="Search..." />
          <i class="bx bx-search"></i>
        </div> --}}
        

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </div>
        <div class="profile-details">
         <span class="admin_name">
          {{auth()->user()->name}}
          <a class="" style="text-decoration:none" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>
         </span>
          {{-- <i class="bx bx-chevron-down"></i> --}}
        </div>
      </nav>
      
      <div class="home-content">
       <div class="sales-boxes">
          <div class="recent-sales box">
           <span class="text-primary">Hi!! {{auth()->user()->name}} <i class="text-secondary">Welcome to Dahboard</i></span><br>
           <img src="/assets/images/emp.jpg" alt=""  height="350" width="100%">
         </div>
        </div>
      </div>
    </section>
  </body>
</html>
