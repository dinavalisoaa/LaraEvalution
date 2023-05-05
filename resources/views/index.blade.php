@extends('header')
@section('title')
<title>NEW-IA</title>

@endsection
@section('content')
<div class="a-container">
   <h1 style="text-align:center;">IA NEWS</h1>
   <div class="o-card_container">
      
@foreach ($articles as $row )
    
<div class="o-card" id="Ernest_Hemingway">
   <div class="o-card_header">
      <div class="o-card_headerHeroImg"  data-image="/{{$row->photo}}"></div>
      <ul class="o-card-headerList">
         <li class="o-card-headerList--openIcons ">
            <span></span>
            <span></span>
            <span></span>
         </li>
         <li class="o-card-headerList--item">
            <a class="o-card-headerList--link" href="#"><i class="icon-facebook"></i></a>
         </li>
         <li class="o-card-headerList--item">
            <a class="o-card-headerList--link" href="#"><i class="icon-twitter"></i></a>
         </li>
         <li class="o-card-headerList--item">
            <a class="o-card-headerList--link" href="#"><i class="icon-linkedin"></i></a>
         </li>
         <li class="o-card-headerList--item">
            <a class="o-card-headerList--link" href="#"><i class="icon-github"></i></a>
         </li>
      </ul>
      <div class="o-card_logo" style="background:url(https://s3.eu-west-2.amazonaws.com/pirolab/images/hemingway.jpg) center no-repeat;"></div>
   </div>
   <div class="o-card_body">
      <h1 class="h1">    
           <?php echo $row->title?>
      </h1>
      <p class="o-card_paragraph">
      <?php echo $row->resume?>
      </p>
   </div>
   <div class="o-card_footer">
<a href="/<?php echo Util::slugify($row->titre)."-".$row->id ?>.html">
      {{-- <a data-href="Ernest_Hemingway" href="target="_blank" class="a-readMore" data-modal="#first"> --}}
         Read More <i class="icon-right"></i></a>
   </div>
   <div class="o-modal">
      <span class="o-modal__close">
      <i class="icon-cancel-circled"></i>
      </span>
      <h2 class="o-modal__title"></h2>
      <div class="o-modal__inner"></div>
   </div>
   <div class="a-loader">
      <div class="a-loader__bar"></div>
      <div class="a-loader__bar"></div>
      <div class="a-loader__bar"></div>
   </div>
</div>
      @endforeach


   </div>
</div>
</div>
</main>
@endsection