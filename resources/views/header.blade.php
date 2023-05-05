<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @yield('description')

    @yield('title')
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
	<meta name="keywords" content="photo, html">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/header.css">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    
	<link rel="stylesheet" href="/bootstrap.min.css"/>
	<link rel="stylesheet" href="/font-awesome.min.css"/>
</head>
<style>
</style>

<body>
  <header class="header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4 col-md-3 order-2 order-sm-1">
					<div class="header__social">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-instagram"></i></a>
					</div>
				</div>
				<div class="col-sm-4 col-md-6 order-1  order-md-2 text-center">
          <h2>
            <button class="btn btn-primary">IA</button>
            <button class="btn btn-dark">ACTU</button>
          </h2>
					
				</div>
				<div class="col-sm-4 col-md-3 order-3 order-sm-3">
					<div class="header__switches">
						<a href="#" class="search-switch"><i class="fa fa-search"></i></a>
						<a href="#" class="nav-switch"><i class="fa fa-bars"></i></a>
						<a href="#"><i class="fa fa-shopping-cart"></i></a>
					</div>
				</div>
			</div>
			<nav class="main__menu">
				<ul class="nav__menu">
					<li><a href="./index.html" class="menu--active">Home</a></li>
					<li><a href="./about.html">About</a></li>
					<li><a href="./gallery.html">Gallery</a></li>
					<li><a href="./blog.html">Blog</a>
						<ul class="sub__menu">
							<li><a href="./blog-single.html">Type article</a></li>
						</ul>
					</li>
					<li><a href="./contact.html">Contact</a></li>
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
