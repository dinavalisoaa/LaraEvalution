@extends('header')
@section('title')
<?php 
            echo $articles->titre ?>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <style>
            .containera {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(500px, 1fr));
                grid-auto-rows: minmax(80px, auto);
                gap: 20px;
            }

            img {
                width: 100%;
                max-width: 400px;
            }

            html {
                font-size: 1em;
            }

            .containerx {
                column-width:500px;
                column-gap: 20px;
            }

            .cardx {
                break-inside: avoid;
                page-break-inside: avoid;
                background-color: rgb(213, 231, 223);
                border: 2px solid rgb(223, 242, 250);
                padding: 10px;
                margin: 0 0 1em 0;
            }
        </style>

        <div class="containerx">


            <?php 
        // foreach ($articles as $key ) 
        
      ?>
            <div class="cardx">
                <h2>
                    <?php 
            echo $articles->titre ?>
                </h2>
                <img src="/<?php echo $articles->photo?>" />
                <p>
                    <?php 
    echo $articles->resume ?>
                </p>
            </div>
            <div class="cardx">
            <p><?php echo $articles->contenu ?></p>

            </div>
            <?php
       
        ?>

        </div>

    </div>
</div>
<p>

    @include('message')
</p>
</body>
@endsection
@if(Route::is('test'))
@endif

</html>