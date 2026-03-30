 <li class="nav-item  {{ session('lsbm') == 'tour' ? ' menu-open ' : '' }}">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-chart-pie"></i>
      <p>
         Tours
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('admin.toursAll')}}" class="nav-link {{ session('lsbsm') == 'toursAll' ? ' active ' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>All Tours</p>
        </a>
      </li>
      
        
    </ul>
</li>