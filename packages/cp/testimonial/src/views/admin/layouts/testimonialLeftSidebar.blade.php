 <li class="nav-item  {{ session('lsbm') == 'testimonial' ? ' menu-open ' : '' }}">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-chart-pie"></i>
      <p>
        Testimonials
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('admin.testimonialAll')}}" class="nav-link {{ session('lsbsm') == 'testimonialAll' ? ' active ' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Testimonials All</p>
        </a>
      </li>


    </ul>
</li>
