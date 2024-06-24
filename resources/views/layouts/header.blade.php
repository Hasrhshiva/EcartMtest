<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="icon" href="">
    <meta name="description" content="">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link  href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"  rel="stylesheet"/>
        <link  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"  rel="stylesheet"/>
        <link  href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.css" rel="stylesheet"/>
        <link  href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap4.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"/>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <title>Document</title>
    <link href="{{asset('css/dashboard/dashboard.css')}}" rel="stylesheet">

</head>
<body>
    @include('layouts.logo')
    @include('layouts.sidebar')
  


    <div id="main-content">
        <div id="header">
            <div class="header-left float-left">
                <i class="ri-menu-line" id="toggle-left-menu"></i>
            </div>
            <div class="header-right float-right">
                <i class="ri-user-line" ></i>
                <label>{{auth()->user()->first_name}} {{auth()->user()->last_name}}</label>
            </div>
        </div>  
        <div id="page-container">
            @yield('content') 
        </div>
       <div class="mt-5">
           
       </div>
    </div>
    @include('layouts.script')
    <script>
        new DataTable('#example', {
            responsive: true
        });
    </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
      <script type="text/javascript">
       
           $('.show_confirm').click(function(event) {
                var form =  $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    form.submit();
                  }
                });
            });
        
      </script>
</body>
</html>