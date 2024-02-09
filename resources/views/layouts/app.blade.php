<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@vite('resources/sass/app.scss')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#25281f">
    <title>{{ config('app.name', 'Laravel') }}</title>
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="{{asset('AdminUI/assets/images/favicon.png')}}" />
      
      <!-- Library / Plugin Css Build -->
      <link rel="stylesheet" href="{{asset('AdminUI/assets/css/core/libs.min.css')}}" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
   
      
      <!-- Vrooom Design System Css -->
      <link rel="stylesheet" href="{{asset('AdminUI/assets/css/vrooom.min.css?v=1.1.01')}}" />
      
      <!-- Custom Css -->
      <link rel="stylesheet" href="{{asset('AdminUI/assets/css/custom.min.css?v=1.1.01')}}" />

      <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <!-- Favicon -->
    <style>
       
    title{
        background-color: #25281f;
        background: #25281f !important;
    }
 
.footer {
    font-size: 14px;
    background: #25281f;
    bottom: 0;
    margin-bottom: 0px;
    position: relative;
    bottom: 0;
    width: auto;
    color:#FFC107;
    border:1px solid #FFC107;
}

a {
  color:#FFC107;
    text-decoration: none;
}
      </style>
    @if(Auth::check())
    
    @else
     <style>
      body{

        background-image:url('{{asset("AdminUI/assets/images/cars.jpg")}}');
        background-size:cover;
      }
      .card{

        background-color: rgb(0,0,0,0.2) !important;
      }
      .col-form-label {
    font-weight: 800;
    padding-top: -webkit-calc(0.5rem + 1px);
    padding-top: calc(0.5rem + 1px);
    padding-bottom: -webkit-calc(0.5rem + 1px);
    padding-bottom: calc(0.5rem + 1px);
    margin-bottom: 0;
    font-size: 22px;
    line-height: 1.5;
    color: #fff;
}

      </style>
@endif
@yield('style')

<style>
  .btn-primary {
    color: #fff;
    background-color: #ffe52e;
    border-color: #ffe52e;
    -webkit-box-shadow: 0 0px 0px 0 rgba(0,0,0,0);
    box-shadow: 0 0px 0px 0 rgba(0,0,0,0);
    -webkit-box-shadow: rgba(245,65,20,0.3);
    box-shadow: rgba(245,65,20,0.3);
}
  .nav {
    background: #25281f;
    color:#fff;
    border:1px solid #FFC107;

}
.sidebar-two+.tab-content{

overflow:scroll;
}
.sidebar-two+.tab-content+.main-content {
    -webkit-transition: all 400ms ease;
    -o-transition: all 400ms ease;
    transition: all 400ms ease;
    border:1px solid #FFC107;
    padding:8px;
}
 
.nav-link svg{

  color:#fce043;
}
 
.caption-title{

  color:#FFC107;
}
body {
    
    color: #FFC107;
    
    background-color:#25281f;
    
}

.item-name{
  color: #FFC107;

}
.card {
    -webkit-box-shadow: 0 10px 30px 0 rgba(132,31,6,0.05);
    box-shadow: 0 10px 30px 0 rgba(132,31,6,0.05);
    margin-bottom: 2rem;
    background: #25281f;
    color: #FFC107;
    border:1px solid #FFC107;
}
.card .card-header {
    margin-bottom: 0;
    border: 0;
    padding-bottom: 0;
    background:  #25281f;
    color:  #FFC107;
    border:1px solid #FFC107;
}
.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
    color: #FFC107 !important;
}
.sidebar-two {
    width: 4.375rem;
    background:  #25281f;
    color: #FFC107;
    -webkit-box-shadow: 0.25rem 0rem 1.5rem 0rem rgba(51,57,70,0.05);
    box-shadow: 0.25rem 0rem 1.5rem 0rem rgba(51,57,70,0.05);
    z-index: 915;
    color: #FFC107;
}
.dataTables_wrapper .dataTables_length select {
    border: 1px solid #fce043 !important;
    border-radius: 3px;
    padding: ;
    background-color: transparent;
    ent: ;
    padding: 4px;
}
.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #fce043 !important;
    background: #25281f;
    color: #fce043;
}
table.table-bordered.dataTable td, table.table-bordered.dataTable th {
    border-bottom-width: 1px;
    color: #fce043;
}
.table-bordered{
  border: 1px solid #fce043 !important;

}  
table.dataTable tbody tr {
    background-color: #22251c !important;
}
.loader.simple-loader {
    background-color: .sidebar-two;
    height: 100%;
    width: 100%;
    position: fixed;
    place-content: center;
    overflow: hidden !important;
    right: 0px;
    z-index: 1250;
    background: #FFD000;
    color: #FFC107;

}
.sidebar-two+.tab-content {
    position: fixed;
    height: 100vh;
    background: #212423;
    width: 14.375rem;
    left: 4.375rem;
    z-index: 910;
    top: 0;
    -webkit-transition: all 400ms ease;
    -o-transition: all 400ms ease;
    transition: all 400ms ease;
    color: #FFC107;
}
.sidebar .sidebar-header {
    border-bottom: 1px solid #f9db32;
    margin-bottom: 0.75rem;
}
.sidebar .sidebar-toggle {
    cursor: pointer;
    background: #ead339;
    color: #fff;
    padding: 0.2rem;
    -webkit-border-radius: 1rem;
    border-radius: 1rem;
    -webkit-box-shadow: 0 0.125rem 0.25rem rgba(245,65,20,0.1);
    box-shadow: 0 0.125rem 0.25rem rgba(245,65,20,0.1);
}
.dropdown-menu {
    position: absolute;
    z-index: 1000;
    display: none;
    min-width: 10rem;
    padding: 0.5rem 0;
    margin: 0;
    font-size: 1rem;
    color: #ffc107;
    text-align: left;
    list-style: none;
    background-color: #25281f;
    -webkit-background-clip: padding-box;
    background-clip: padding-;
    border: 1px solid rgb(255 193 7);
  }
  .dropdown-item {
    display: block;
    width: 100%;
    padding: 0.25rem 1rem;
    clear: both;
    font-weight: 400;
    color: #ffc107;
    text-align: inherit;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
}
.dropdown-item:hover {
    display: block;
    width: 100%;
    padding: 0.25rem 1rem;
    clear: both;
    font-weight: 400;
    color: #FFF;
    text-align: inherit;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
}
 
  </style>
</head>
<body class="  ">
    <span class="screen-darken backdrop"></span>
 <!-- loader Start -->
 <!-- <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body">
              <div class="position-relative">
                  <div class="position-absolute" style="top: -20px; z-index: 1;">
                  <h1  class="text-center m-5">JUMOCAR</h1>
                      <img src="{{asset('AdminUI/assets/images/logo2.png')}}" class="img-fluid" alt="img1">  
                  </div>
                  <div class="position-relative iq-loader">
                      <img src="{{asset('AdminUI/assets/images/Vector.png')}}" class="img-fluid" alt="img1">
                  </div>
              </div>
          </div>
      </div>
    </div> -->

    @if(Auth::check())
    @include('layouts.sidebar')
    @endif
    <!-- loader END -->
    <main class="main-content ">
     
      @include('layouts.header')
      <div class="mt-5">

      @if (session('success'))

      <div class="alert alert-success alert-dismissible fade show w-auto" role="alert">
      {{ session('success') }}
   
</div>

    
 @endif
 </div>
    
    @yield('content')
 
    @if(Auth::check())
      @include('layouts.footer')
    @endif
   
      
           

      </main>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
      <!-- Library Bundle Script -->
      <script src="{{asset('AdminUI/assets/js/core/libs.min.js')}}"></script>
    
    <!-- External Library Bundle Script -->
    <script src="{{asset('AdminUI/assets/js/core/external.min.js')}}"></script>
    
    <!-- mapchart Script -->
    <script src="{{asset('AdminUI/assets/js/charts/vectore-chart.js')}}"></script>
    <script src="{{asset('AdminUI/assets/js/charts/dashboard.js')}}" defer></script>
    
    <!-- fslightbox Script -->
    <script src="{{asset('AdminUI/assets/js/plugins/fslightbox.js')}}"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <!-- AOS Animation Plugin-->
    
    <!-- App Script -->
    <script src="{{asset('AdminUI/assets/js/vrooom.js')}}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
	
	 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Include DataTables library -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <!-- Include DataTables Buttons extension -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>-->
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <script>
	ClassicEditor
		.create( document.querySelector( '#editor' ) )
    
		.catch( error => {
			console.error( error );
		} );
</script>
<script>
	ClassicEditor
		.create( document.querySelector( '#editor1' ) )
    
		.catch( error => {
			console.error( error );
		} );
</script>
<script>
	ClassicEditor
		.create( document.querySelector( '#editor3' ) )
    
		.catch( error => {
			console.error( error );
		} );
</script>
    <script>
      let table = new DataTable('#myTable');
      </script>
      <script>
 setTimeout(function() {
    $('.alert').fadeOut('slow');}, 3000
  );
        </script>
        @yield('script')
</body>
</html>
