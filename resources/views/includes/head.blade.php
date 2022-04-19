<meta charset="utf-8">

<!-- load bootstrap from a cdn -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- load fontawesome from a cdn -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

<style>
    html {  
        position: relative;  
        min-height: 100%;  
    }

    body {  
        padding-top: 4.5rem;  
        margin-bottom: 4.5rem;  
    }

    .nav-link:hover {  
        transition: all 0.4s;  
    }

    .nav-link-collapse:after {  
        float: right;  
        content: '\f067';  
        font-family: 'FontAwesome';  
    }

    .nav-link-show:after {  
        float: right;  
        content: '\f068';  
        font-family: 'FontAwesome';  
    }

    .nav-item ul.nav-second-level {  
        padding-left: 0;  
    }

    .nav-item ul.nav-second-level > .nav-item {  
        padding-left: 20px;  
    }

    @media (min-width: 992px) {  
        .sidenav {  
            position: absolute;  
            top: 0;  
            left: 0;  
            width: 230px;  
            height: calc(100vh - 3.5rem);  
            margin-top: 3.5rem;  
            background: #343a40;  
            box-sizing: border-box;  
            border-top: 1px solid rgba(0, 0, 0, 0.3);  
        }

        .navbar-expand-lg .sidenav {  
            flex-direction: column;  
        }
        
        .content-wrapper {  
            margin-left: 230px;  
        }

        .footer {  
            width: calc(100% - 230px);  
            margin-left: 230px;  
        }
    }
</style>

<script>  
    $(document).ready(function() {  
    $('.nav-link-collapse').on('click', function() {  
        $('.nav-link-collapse').not(this).removeClass('nav-link-show');  
        $(this).toggleClass('nav-link-show');  
    });  
    });  
</script>  