@extends('header')
@section('content')

<div class="row">
    <div class="col-md-12">
Bonjour
<?php echo $all->nom?>
<p>

</p>

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