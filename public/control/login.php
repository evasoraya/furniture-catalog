<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Resonance E comerce</title>
    <script src="../lib/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <link href="../css/login.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<div class="container-fluid col-sm-12">
    <?php include 'navbar.php'; ?>
    <div class="container custom-margin col-sm-12">
        <div class="image-container col-sm-4">
            <img class="leading-image" src="../img/resonanceBackground.png" width="100%"/>
        </div>
        <div class="form-container col-sm-8 login-container">
            <div class="login-form-container">
                <form class="form-login" id="loginForm">
                    <h2 >Welcome back, please log in</h2>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" autofocus>
                    <br>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <br>
                    <button class="btn btn-theme btn-block" id="loginBtn" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                </form>
            </div>
            <hr/>
            <h4 class="custom-text">Or</h4>
            <div class="signup-option">
                <a href="signup.php"><h2>Create New Account</h2></a>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="../js/api.js"></script>
<script type="text/javascript" src="../js/login.js"></script>
</body>

</html>
