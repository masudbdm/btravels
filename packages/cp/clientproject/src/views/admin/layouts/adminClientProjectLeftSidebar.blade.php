 <li class="nav-item  {{ session('lsbm') == 'clientproject' ? ' menu-open ' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas  fa-folder"></i>
              <p>
                Client Project
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.clientsAll') }}" class="nav-link {{ session('lsbsm') == 'clientsAll' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Clients All</p>
                </a>
              </li>


               <li class="nav-item">
                <a href="{{ route('admin.ourProjectAll') }}" class="nav-link {{ session('lsbsm') == 'ourProjectAll' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project All</p>
                </a>
              </li>

            </ul>
          </li>
