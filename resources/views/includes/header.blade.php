<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">  
    <a class="navbar-brand" href="#"> Pay Parking </a>  
    <button  
        class="navbar-toggler"  
        type="button"  
        data-toggle="collapse"  
        data-target="#navbarCollapse"  
        aria-controls="navbarCollapse"  
        aria-expanded="false"  
        aria-label="Toggle navigation">  
        <span class="navbar-toggler-icon"> </span>  
    </button>  
    <div class="collapse navbar-collapse" id="navbarCollapse">  
        <ul class="navbar-nav mr-auto sidenav" id="navAccordion"> 
            @if($path == 'home')
                <li class="nav-item active">  
                    <a class="nav-link" href="home"> Home </a>  
                </li>  
            @else
                <li class="nav-item">  
                    <a class="nav-link" href="home"> Home </a>  
                </li>  
            @endif

            @if($path == 'packages')
                <li class="nav-item active">  
                    <a class="nav-link" href="packages"> Packages </a>  
                </li> 
            @else
                <li class="nav-item">  
                    <a class="nav-link" href="packages"> Packages </a>  
                </li> 
            @endif
            
            @if($path == 'users')
                <li class="nav-item active">  
                    <a class="nav-link" href="users"> Users </a>  
                </li> 
            @else
                <li class="nav-item">  
                    <a class="nav-link" href="users"> Users </a>  
                </li> 
            @endif
                   
        </ul>
    </div>
</nav>