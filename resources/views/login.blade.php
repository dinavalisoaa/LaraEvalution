<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Pure CSS3 Login Form</title>
  <link rel="stylesheet" href="/login.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Sign In </h2>
    <h2 class="inactive underlineHover">Sign Up </h2>

    <!-- Icon -->
    <div class="fadeIn first">
      {{-- <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" /> --}}
    </div>

    <!-- Login Form -->
    <form action="/action_login" method="post">
      @csrf
      {{ csrf_field() }}
        {{-- <label></label> --}}
      <input type="text" id="login" class="fadeIn second"value="rabe@gmail.com" name="login" placeholder="login">
      <input type="text" id="password" class="fadeIn third" name="mdp" value="rabe"placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
<!-- partial -->
  
</body>
</html>
