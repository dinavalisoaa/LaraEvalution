@extends('header')

@section('description')
    <meta name="description" content="Liste des actualites">
@endsection
@section('title')
    <title>NEW-IA</title>
@endsection
@section('auth')
<ul class="nav__menu">
    <li><a href="/articles/list" class="menu--active">HOME</a></li>
    <li><a href="/login">LOGIN</a></li>
</ul>
@endsection
@section('login')
    <div class='icons'>
<a href="fsjdiuroieyiuw.html">

</a>

        <div class='block'>
            <a class='user_profile' href='/login'>

                <button class="btn btn-default">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 299.997 299.997">
                        <path
                            d="M149.996,0C67.157,0,0.001,67.158,0.001,149.997c0,82.837,67.156,150,149.995,150s150-67.163,150-150    C299.996,67.156,232.835,0,149.996,0z M150.453,220.763v-0.002h-0.916H85.465c0-46.856,41.152-46.845,50.284-59.097l1.045-5.587    c-12.83-6.502-21.887-22.178-21.887-40.512c0-24.154,15.712-43.738,35.089-43.738c19.377,0,35.089,19.584,35.089,43.738    c0,18.178-8.896,33.756-21.555,40.361l1.19,6.349c10.019,11.658,49.802,12.418,49.802,58.488H150.453z">
                        </path>
                    </svg>
                    LOGIN

                </button>
            </a>
            </a>
        </div>
    </div>
@endsection
@section('content')
    <header class="header">
        <div class="container-fluid">
            <nav class="main__menu">
                <ul class="nav__menu">
                    {{-- <ul class="nav__menu">
                        <li><a href="/articles/list" class="menu--active">HOME</a></li>
                        <li><a href="/login">LOGIN</a></li>
                    </ul> --}}
                    @foreach ($theme as $row)
                @if ($admin!=-1)
                <li style="background-color: ghostwhite;border-radius:30px"><a href="/articles/list?theme={{ $row->id }}&admin={{$admin}}"
                    ><p>{{ $row->nom }}</p></a></li>
                @else
                <li style="background-color: ghostwhite;border-radius:30px"><a href="/articles/list?theme={{ $row->id }}"
                    ><p>{{ $row->nom }}</p></a></li>
                @endif
                       
                    @endforeach

                </ul>
            </nav>
        </div>
    </header>
    <div class="a-container">
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
                   <h1>Actualite sur l'IA</h1>
                   <h3>{{$topic}}</h3>
                </div>

                <div class="row">
                    @foreach ($articles as $row)
                        <div class="col-xl-4">
                            <div class="card">
                                <img class="card-img-top img-fluid" width="200px" height="200px" src="<?php echo $row->photo; ?>" alt="Card image cap">
                                <div class="card-header">
                                   
                                </div>
                                <div class="card-body">
                                     <a href="/<?php echo Util::slugify($row->resume) . '-' . $row->id; ?>.html">
                                            <h5 class="card-title" title="Voir detail"> 
                                                <?php echo $row->titre; ?>
                                            </h5>
                                    </a>
                                    <p class="card-text"> <?php echo $row->resume; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- update article set photo=split_part(photo, './public', 2); --}}
                </div>

            </div>

        </div>
        {{ $articles->links() }}

    </div>
    </div>
    </div>
    </main>
@endsection
