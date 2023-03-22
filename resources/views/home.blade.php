@extends('header')
@section('title')
Ajouter un article
@endsection
@section('content')
<main role="main" class="container">
  <style>
   .containera {
 display: grid;
 grid-template-columns: 1fr 2fr 1fr;
}
</style>
<div class="row">
<div class="containera">
  <div class="box1"></div>
  <div class="box2">  
 <h1>Ajouter un article</h1>
    <form  action="articles/create" enctype="multipart/form-data" method="POST">
      @csrf
        <div class="form-group">
          <label for="exampleInputName1">Titre</label>
          <input type="text" name="titre" class="form-control" id="exampleInputName1" placeholder="titre">
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Resume</label>
          <input type="text" name="resume" class="form-control" id="exampleInputName1" placeholder="resume">
        </div>
        <div class="form-group">
        
          <input type="file" name="image" class="form-control" id="exampleInputName1" placeholder="resume">

        </div>
        <div class="form-group">
          <label >categorie</label>

          <select class="form-control" name="categorie">
            <?php 
              foreach ($categorie as $key) {
?> 
 <option value="<?php echo $key->id?>"><?php echo $key->nom?></option><?php
              }
              ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleTextarea1">Contenu</label>
          <textarea cols="80" class="ckeditor" id="editeur" name="contenu" rows="10"></textarea>

        </div>
    <br/>
    <input type="submit" value="AJOUTER"> 
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <button class="btn btn-light">Cancel</button>
      </form>
    </div>
  <div class="box3"></div>
</div>
</div>
</div>
<p>
 
@include('message')
</p>
</body>
@endsection
</main>
@if(Route::is('test'))
@endif
<script src="/ckeditor/ckeditor.js"></script>

</html>