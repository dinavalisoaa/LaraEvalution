@extends('header')
{{-- @include('header') --}}
@section('title')
    {{-- Ajouter un article --}}
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
                   Tant que : {{$author->nom}}
                </button>
            </a>
            </a>
        </div>
    </div>
@endsection
@section('content')
<div class="a-container">

    <main role="main" class="container">
        {{-- <style>
            .containera {
                display: grid;
                grid-template-columns: 1fr 2fr 1fr;
            }
        </style> --}}
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Checkboxes</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                          <form action="articles/create" enctype="multipart/form-data" method="POST">
           
                          <div class="mb-3">
                              @csrf
                              <div class="form-group">
                                  <label for="exampleInputName1">Titre</label>
                                  <input type="text" name="titre" class="form-control" id="exampleInputName1"
                                      placeholder="titre">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputName1">Resume</label>
                                  <input type="text" name="resume" class="form-control" id="exampleInputName1"
                                      placeholder="resume">
                              </div>
                              <div class="form-group">
      
                                  <input type="file" name="image" class="form-control" id="exampleInputName1"
                                      placeholder="resume">
      
                              </div>
                              <div class="form-group">
                                  <label>categorie</label>
      
                                  <select class="form-control" name="categorie">
                                      <?php 
                    foreach ($categorie as $key) {
      ?>
                                      <option value="<?php echo $key->id; ?>"><?php echo $key->nom; ?></option><?php
                    }
                    ?>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label>THEME</label>
      
                                  <select class="form-control" name="theme">
                                      <?php 
                  foreach ($theme as $key) {
      ?>
                                      <option value="<?php echo $key->id; ?>"><?php echo $key->nom; ?></option><?php
                  }
                  ?>
                                  </select>
                              </div>
                            </div>
      
                                         
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Inline Checkboxes</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            {{-- <form> --}}
                                <div class="mb-3">
                                  <div class="form-group">
                                    <label for="exampleTextarea1">Contenu</label>
                                    <textarea cols="80" class="ckeditor" id="editeur" name="contenu" rows="10"></textarea>
        
                                </div>
                                <br />
                                <input type="submit" value="AJOUTER">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                                </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
           
            </div>
            {{-- <div class="containera">
                <div class="box1"></div>
                <div class="box2">
                    <form action="articles/create" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Titre</label>
                            <input type="text" name="titre" class="form-control" id="exampleInputName1"
                                placeholder="titre">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Resume</label>
                            <input type="text" name="resume" class="form-control" id="exampleInputName1"
                                placeholder="resume">
                        </div>
                        <div class="form-group">

                            <input type="file" name="image" class="form-control" id="exampleInputName1"
                                placeholder="resume">

                        </div>
                        <div class="form-group">
                            <label>categorie</label>

                            <select class="form-control" name="categorie">
                                <?php 
              foreach ($categorie as $key) {
?>
                                <option value="<?php echo $key->id; ?>"><?php echo $key->nom; ?></option><?php
              }
              ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>THEME</label>

                            <select class="form-control" name="theme">
                                <?php 
            foreach ($theme as $key) {
?>
                                <option value="<?php echo $key->id; ?>"><?php echo $key->nom; ?></option><?php
            }
            ?>
                            </select>
                        </div>

                        
                    </form>
                </div>
                <div class="box3"></div>
            </div> --}}
        </div>
        </div>
        <p>

            @include('message')
        </p>
        </body>
    @endsection
</main>
@if (Route::is('test'))
@endif
<script src="/ckeditor/ckeditor.js"></script>

</html>
