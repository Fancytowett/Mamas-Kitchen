<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('backend/assets/img/sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{route('admin.dashboard' )}}" class="simple-text logo-normal">
          Mama'S Kitchen
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item  {{Request::is('Admin/dashboard*') ? 'active':''}}">
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('Admin/slider*') ? 'active':''}}">
                <a class="nav-link" href="{{route('slider.index')}}">
                    <i class="material-icons">slideshow</i>
                    <p>Sliders</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('Admin/category*') ? 'active':''}}">
                <a class="nav-link" href="{{route('category.index')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Categories</p>
                </a>
            </li><li class="nav-item {{Request::is('Admin/item*') ? 'active':''}}">
                <a class="nav-link" href="{{route('category.index')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Items </p>
                </a>
            </li>


            </li><li class="nav-item {{Request::is('Admin/reservation*') ? 'active':''}}">
                <a class="nav-link" href="{{route('reservation.index')}}">
                    <i class="material-icons">chrome_reader_mode</i>
                    <p>Reservations </p>
                </a>
            </li>
            </li><li class="nav-item {{Request::is('Admin/contact*') ? 'active':''}}">
                <a class="nav-link" href="{{route('contact.index')}}">
                    <i class="material-icons">chrome_reader_mode</i>
                    <p>Contact Message </p>
                </a>
            </li>

        </ul>
    </div>
</div>
