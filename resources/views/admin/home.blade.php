@extends('header')
@section('content')

<div class="row">
    <div class="col-md-12">

<table class="table">
    <tr>
    <td>Nom</td>
    <td>Email</td>
</tr>
<?php 
foreach ($all as $key) {
?>
<tr>
    <td><?php echo $key['nom']?></td>
    <td><?php echo $key['email']?></td>
<?php
if($key['etat']==0){
    ?>
    <td><a href="<?php echo url('admin/valider/'.$key['id'].""); ?>" class="btn btn-danger">
Validation

</a></td>

    <?php
}
?>
    
</tr>

<?php
}
?>
</table>
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