@extends('header')
@section('content')

<div class="row">
    <div class="col-md-12">

    <table class="table">
    <tr>
    <td>Preduit</td>
    <td>entrer</td>
    <td>sortie</td>
    <td>daty</td>

</tr>
<?php 
Util::crypt('adsin');
// Route::get
?>
<form action="matieres/saisie" method="get">
<tr>
<td>
    
<select name="matiereid">
@foreach($matieres as $row)
<option value="{{ $row->id }}">{{ $row->nom }}</option>
@endforeach
</select>
</td>

<td><input type="number" name="entrer"value="0" /></td>
<td><input  type="number" value="0" name="sortis"/></td>
<td><input type="date" name="daty"/></td>
<td><input type="submit"></td>

</tr>
</form>
</table>
<table class="table">
    <tr>
    <th>Nom</th>
    <th>entrer</th>
    <th>sortie</th>'
    <th>
        
   Date
    <td> 

    </th>
</tr>
<?php 
foreach ($liste as $key) {
?> 
<tr>
    <td><?php echo Matiere::find($key['matiereid'])->nom  ?></td>
    <td><?php echo $key['entrer'] ?></td>
    <td><?php echo $key['sortis'] ?></td>
    <td><?php echo $key['daty'] ?></td>

<?php
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