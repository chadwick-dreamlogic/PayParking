<nav id="sidebar" class="bg-dark">

    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-muted float-right">
            <i class="fas fa-align-left"></i>
        </button>
    </div>

    <div class="sidebar-header">
        <h3>Pay Parking</h3>
        <strong>PP</strong>
    </div>

    <hr class="bg-light">
    
    <ul class="list-unstyled components">
        @if($path == 'home')
            <li class="text-dark bg-light">
                <a href="home" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    Home
                </a>
            </li>
        @else
            <li>
                <a href="home" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    Home
                </a>
            </li>
        @endif

        @if($path == 'packages')
            <li class="text-dark bg-light">
                <a href="packages">
                    <i class="fas fa-briefcase"></i>
                    Packages
                </a>
            </li>
        @else
            <li>
                <a href="packages">
                    <i class="fas fa-briefcase"></i>
                    Packages
                </a>
            </li>
        @endif
            
        @if($path == 'users')
            <li class="text-dark bg-light">
                <a href="users">
                    <i class="fas fa-users"></i>
                    Users
                </a>
            </li>
        @else
            <li>
                <a href="users">
                    <i class="fas fa-users"></i>
                    Users
                </a>
            </li>
        @endif
            
        @if($path == 'agents')
            <li class="text-dark bg-light">
                <a href="agents">
                    <i class="fas fa-user-tie"></i>
                    Agents
                </a>
            </li>
        @else
            <li>
                <a href="agents">
                    <i class="fas fa-user-tie"></i>
                    Agents
                </a>
            </li>
        @endif
            

    </ul>

</nav>
