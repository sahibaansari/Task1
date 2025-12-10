<!DOCTYPE html>
<html lang="zxx">

<head>

    <!-- Metas -->
    <meta charset="utf-8">
    <meta name="author" content="Sahiba">

    <!-- Title  -->
    <title>ShipX</title>


 <!-- Core Style Css -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/style.css') }}">

</head>

<body>


   <div class="sa-hero-wrapper"
       style="background-image: url('{{ asset('client/assets/imgs/hero.jpg') }}');">
    
    
    @include('client.inc.header')


    <main>
      @yield('content')
    </main>

  </div> 

  @include('client.inc.footer')
       
    @yield('script')


<script>
   

     
 <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('client/assets/js/script.js') }}"></script>
    

</script>
   
    

</body>




</html>