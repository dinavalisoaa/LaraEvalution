@extends('header')
@section('description')
<meta name="description" content="{{$articles->resume}}">
@endsection

@section('title')
<title>
{{ $articles->titre}}
    
</title>

@endsection
@section('content')
<link rel="stylesheet" href="./detail.css">
</head>
<body>
<!-- partial:index.partial.html -->
<main class="responsive-wrapper">
	<div class="page-title">
		<h1>Latest Updates</h1>
	</div>
	<div class="magazine-layout">
		<div class="magazine-column">

			@foreach ($autre as $row )
			<article class="article">
				<a href="/<?php echo Util::slugify($row->titre) . '-' . $row->id; ?>.html">
				<h5 class="article-excerpt">
					{{ $row->titre}}	
				</h5>
			</a>
				<div class="article-excerpt">
					{{ $row->resume}}	
				</div>
				
			</article>
			
			@endforeach
			
		</div>
		<div class="magazine-column">
			<article class="article" >
				<figure class="article-img">
					<img  src="{{$articles->photo}}" alt="Photo IA {{$articles->getTheme()->nom}}" title="{{$articles->titre}}" />
				</figure>
                
				<h2 class="article-title article-title--medium">
					<a href="#" class="article-link">
                        <?=$articles->titre?>

                    </a>
				</h2>
				<div class="article-excerpt">
					<?=$articles->contenu?>
				</div>
				<div class="article-author">
					<div class="article-author-img">
						<img src="https://assets.codepen.io/285131/author-2.png" />
					</div>
					<div class="article-author-info">
						<dl>
							<dt>James Robert</dt>
							<dd>Editor</dd>
						</dl>
					</div>
				</div>
			</article>
		</div>
		
		
	</div>
</main>
<!-- partial -->
  
</body>
</html>
@endsection
