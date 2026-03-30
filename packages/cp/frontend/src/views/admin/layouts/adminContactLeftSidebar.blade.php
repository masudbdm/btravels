 <li class="nav-item  {{ session('lsbm') == 'contact' ? ' menu-open ' : '' }}">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-pager"></i>
      <p>
        Contact
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('admin.contactsAll')}}" class="nav-link {{ session('lsbsm') == 'contactsAll' ? ' active ' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Contacts All</p>
        </a>
      </li>
      
        
    </ul>
</li>