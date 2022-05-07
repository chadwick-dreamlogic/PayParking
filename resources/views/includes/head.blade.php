<meta charset="utf-8">

<!-- sidebar style -->
<link rel="stylesheet" href="{{ URL::to('css/sidebar.css') }}">

<!-- load jquery -->
<script src = "{{ URL::to('js/bootstrap/jquery.js') }}"></script>

<!-- load bootstrap -->
<link rel="stylesheet" href="{{ URL::to('css/bootstrap/bootstrap.min.css') }}">
<script src="{{ URL::to('js/bootstrap/popper.min.js') }}"></script>   
<script src="{{ URL::to('js/bootstrap/bootstrap.min.js') }}"></script>

<!-- load fontawesome -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" /> -->
<link rel="stylesheet" type="text/css" href="{{ URL::to('css/fontawesome/css/all.min.css') }}" />


<script>  
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
});
</script>  