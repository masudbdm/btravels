<li class="nav-item  {{ session('lsbm') == 'team' ? ' menu-open ' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas  fa-folder"></i>
        <p>
        Teams
        <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="{{ route('admin.teamsAll') }}" class="nav-link {{ session('lsbsm') == 'teamsAll' ? ' active ' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Teams All</p>
        </a>
        </li>
    </ul>
</li>
