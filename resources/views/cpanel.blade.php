<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabulator/5.5.2/css/tabulator_bootstrap5.min.css" integrity="sha512-904y6HHQyQS2fAyIQ869rH3AAkxZeFuxo9vheji5zw+IPEyioMWN4Bt/VFhzO5edPZ9m1lwkpYgXcYcm1vzaFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables@5.5.2/dist/js/tabulator.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat">
    <link href="{{ URL::asset('css/style.css') }} " rel="stylesheet">
    <title>Sunergetics - Cpanel</title>
</head>
<body>

<div id="sky">
	<div class="theSun">
		<div class="ray_box">
			<div class="ray ray1"></div>
			<div class="ray ray2"></div>
			<div class="ray ray3"></div>
			<div class="ray ray4"></div>
			<div class="ray ray5"></div>
			<div class="ray ray6"></div>
			<div class="ray ray7"></div>
			<div class="ray ray8"></div>
			<div class="ray ray9"></div>
			<div class="ray ray10"></div>
		</div>
	</div>
	<div class="cloudwrapperOne">
		<div class="cloud c1"></div>
    </div>
	<div class="cloudwrapperTwo">
		<div class="cloud c2"></div>
	</div>
	<div class="cloudwrapperThree">
		<div class="cloud c3"></div>
	</div>

</div>
</div>



<div class='container-fluid p-0'>
    <div id="cpanel"></div>
</div>
<div style="position: relative">
      <h1 style="" class="display-1 brand">Sunergetic</h1>
    </div>

    <script type="text/javascript" src="{{ asset('js/cpanel.js') }}"></script>        
</body>
</html>