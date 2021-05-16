<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Creative Tim
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item @if(request()->routeIs('dashboard')) active @endif">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item @if(request()->routeIs('posts.create')) active @endif">
                <a class="nav-link" href="{{ route('posts.create') }}">
                    <i class="material-icons">article</i>
                    <p>Add Post</p>
                </a>
            </li>

            <li class="nav-item active-pro ">
                <a class="nav-link" href="https://t.me/it_swipe">
                    <p>Our Telegram</p>
                </a>
            </li>
        </ul>
    </div>
</div>
