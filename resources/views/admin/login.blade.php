<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/submit.css">
    <title>log in</title>
</head>
<body>
    <section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
            class="img-fluid" alt="Phone image">
        </div>

        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <form action="<?php echo url('admin/actionLogin'); ?>" class="box form-prevent-multiple-submits" method="get">
                <div class="form-outline mb-4">
                    <input type="text" id="form1Example13" name="email" class="form-control form-control-lg" required/>
                    <label class="form-label" for="form1Example13">Email address</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="form1Example23" name="mdp" class="form-control form-control-lg" required />
                    <label class="form-label" for="form1Example23">Password</label>
                </div>

                <div class="d-flex justify-content-around align-items-center mb-4">

                  <a href="{{ url('admin/signup')}}">inscription</a>
                  <a href="{{ url('/')}}">En tant que Users</a>

                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-lg btn-block button-prevent-multiple-submits">
                    <i class="spinner fa fa-spinner fa-spin"></i> Sign in 
                </button>
            </form>
        </div>
        </div>
        <center>
            <h2>
                <?php if (isset($error)) 
                {
                    echo $error;
                }  ?>
            </h2>
        </center>
    </div>
    </section>
    <script src="../js/submit.js"></script>
</body>
</html>