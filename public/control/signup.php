<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Resonance E comerce</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="../lib/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="../css/signup.css" rel="stylesheet" type="text/css"/>
    <link href="../css/login.css" rel="stylesheet" type="text/css"/>
</head>

<body>
    <div class="container-fluid col-sm-12">
        <?php include 'navbar.php'; ?>
        <div class="container col-sm-12">
            <a href="login.php" class="btn  login-button"><i class="fa fa-chevron-left fa-4x" ></i> </a>
            <br>
            <div class="image-container custom-margin col-sm-4">
                <img class="leading-image" src="../img/resonanceBackground.png" width="100%"/>
            </div>
            <div class="col-sm-8 custom-margin signup-form-container">
                <form class="form-signup" id="signupForm">
                    <h2 >Welcome to Resonance e-commerce, please fill up the form</h2>
                    <br>
                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                    <br>
                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                    <br>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email Address">
                    <br>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                    <br>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <br>
                    <button class="btn btn-theme btn-block" id="signupBtn" type="submit"><i class="fa fa-lock"></i> Create New Account</button>
                </form>
            </div>
        </div>

    </div>


</body>
<script type="text/javascript" src="../js/api.js"></script>
<script type="text/javascript" src="../js/signup.js"></script>
</html>
