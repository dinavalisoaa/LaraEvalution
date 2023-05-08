<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @yield('description')

    @yield('title')
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
	<meta name="keywords" content="photo, html">
    {{-- <link rel="stylesheet" href="/style.css"> --}}
    <link rel="stylesheet" href="/header.css">
    {{-- <link rel="stylesheet" href="/bootstrap/css/bootstrap.css"> --}}
    {{-- <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css"> --}}
    
	{{-- <link rel="stylesheet" href="/bootstrap.min.css"/> --}}
	<link rel="stylesheet" href="/font-awesome.min.css"/>
</head>
<style>
</style>

<body>
  <header class="header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4 col-md-3 order-2 order-sm-1">
				</div>
				<div class="col-sm-4 col-md-6 order-1  order-md-2 text-center">
          <h2 style="font-family:Fantasy">IA ACTU
            {{-- <button class="btn btn-primary">IA</button> --}}
            {{-- <button class="btn btn-dark">ACTU</button> --}}
          </h2>
					
				</div>
				<div class="col-sm-4 col-md-3 order-3 order-sm-3">
					<div class="header__switches">
					
					</div>
				</div>
			</div>
			<nav class="main__menu">
				<ul class="nav__menu">
					<li><a href="/articles/list" class="menu--active">HOME</a></li>
					<li><a href="/login">LOGIN</a></li>
				</ul>
			</nav>
		</div>
	</header>
          <main>
    </main>
    @yield('content')

    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="/script.js"></script>
    <script src="/header.js"></script>

</body>

</html>
