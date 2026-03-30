 <li class="nav-item  {{ session('lsbm') == 'tourPackage' ? ' menu-open ' : '' }}">
    <a href="#" class="nav-link">
      <i class="nav-icon fas  fa-folder"></i>
      <p>
       Tour Packages
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">

        <li class="nav-item">
        <a href="{{ route('admin.tourPackagesAll')}}" class="nav-link {{ session('lsbsm') == 'tourPackagesAll' ? ' active ' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Tour Packages All</p>
        </a>
      </li>

    </ul>
  </li>
