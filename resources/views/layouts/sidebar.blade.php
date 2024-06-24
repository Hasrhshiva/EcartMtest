<div id="left-menu">
    <ul>
        <li class="{{ request()->is('home') ? 'active' : '' }}"><a href="{{url('/')}}">
            <i class="ri-dashboard-line"></i>
            <span>Web</span>
        </a></li>
       
        <li class="{{ request()->is('products*') ? 'active' : '' }}"><a href="{{url('/products')}}">
            <i class="ri-contacts-book-3-line"></i>
            <span>Products</span>
        </a></li>
       
        <li class="logout-bar" id="logout-bar">
            
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                             
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                @csrf
            </form>
        </li>
    </ul>
</div>