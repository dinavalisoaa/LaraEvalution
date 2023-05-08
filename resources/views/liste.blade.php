@extends('header')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>Etat de stock</h3>
            <a href="/matieres/achatTodo">
                <button class="btn btn-success">Liste des achats a faire</button>
            </a>
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
                    column-width: 500px;
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
        foreach ($articles as $key ) {
      ?>
                <div class="cardx">
                    <h2>
                        <?php
                        echo $key->titre; ?>
                        /uploads/<?php echo $key->photo; ?>
                    </h2>
                    <img src="/uploads/<?php echo $key->photo; ?>" />
                    <p>
                        <?php
                        // ("JI io h vgf ytyt ytyu,9i hhi iii jjk hhu yyu h yytyt huy yuyuOPOiu");
                        
                        echo $key->resume;
                        ?>
                        <?php
                        ?>

                    </p>
                    <p>

                        <a href="<?php echo Util::slugify($key->titre) . '-' . $key->id; ?>.html">
                            <button class="btn btn-success">
                                VOIR+
                            </button>
                        </a>

                    </p>
                </div>


                <?php
        }
        ?>

            </div>

        </div>
    </div>
    <p>

        @include('message')
    </p>
    </body>
@endsection
@if (Route::is('test'))
@endif

</html>
