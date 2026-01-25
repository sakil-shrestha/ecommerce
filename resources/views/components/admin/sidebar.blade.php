<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html"> <img alt="image" src="/assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">Otika</span>
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown {{request()->is('admin/dashboard*')?'active':''}}">
            <a href="{{route('admin.dashboard')}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>

        <li class="{{request()->is('admin/company*')?'active':''}}"><a class="nav-link active" href="{{route('company.index')}}"><i data-feather="briefcase"></i><span>Company</span></a>
        </li>
        <li class="{{request()->is('admin/product*')?'active':''}}"><a class="nav-link" href="{{route('product.index')}}"><i data-feather="command"></i><span>Products</span></a>
        </li>
        <li class="{{request()->is('admin/category*')?'active':''}}"><a class="nav-link" href="{{route('category.index')}}"><i data-feather="tag"></i><span>Categories</span></a></li>
        </li>


    </ul>
</aside>
