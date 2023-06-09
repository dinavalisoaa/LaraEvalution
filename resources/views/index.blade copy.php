@extends('header')

@section('description')
    <meta name="description" content="Liste des actualites">
@endsection
@section('title')
    <title>NEW-IA</title>
@endsection
@section('login')
    <div class='icons'>


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
                @foreach ($theme as $row )
                <li><a  href="/articles/list?theme={{$row->id}}" class="btn btn-success">{{$row->nom}}</a></li>
                @endforeach

            </ul>
        </nav>
    </div>
</header>
    <div class="a-container">
        <h1 style="text-align:center;">IA NEWS</h1>
        <div class="o-card_container">

            @foreach ($articles as $row)
                <div class="o-card" id="Ernest_Hemingway">
                    <div class="o-card_header">
                        <div class="o-card_headerHeroImg" data-image="/{{ $row->photo }}"></div>

                    </div>
                    <div class="o-card_body">
                        <h1 class="h1">
                            <?php echo $row->title; ?>
                        </h1>
                        <p class="o-card_paragraph">
                            <?php echo $row->resume; ?>
                        </p>
                    </div>
                    <div class="o-card_footer">
                        <a href="/<?php echo Util::slugify($row->resume) . '-' . $row->id; ?>.html">
                            <i class="icon-right"></i></a>
                    </div>
                    {{-- <div class="o-modal">
                        <span class="o-modal__close">
                            <i class="icon-cancel-circled"></i>
                        </span>
                        <h2 class="o-modal__title"></h2>
                        <div class="o-modal__inner"></div>
                    </div> --}}
                    {{-- <div class="a-loader">
                        <div class="a-loader__bar"></div>
                        <div class="a-loader__bar"></div>
                        <div class="a-loader__bar"></div>
                    </div> --}}
                </div>
            @endforeach
{{
    $articles->links();
}}

        </div>
    </div>
    </div>
    </main>
@endsection
