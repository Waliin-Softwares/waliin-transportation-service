<?php 
    use app\core\Application;
    // var_dump(Application::$app->user);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Page</title>
</head>

<body style="background-color:grey">

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Waliin Transporation Service</a>
            </div>
            <div id="navcol-1" class="collapse navbar-collapse">
                <ul class="nav navbar-nav ms-auto">
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="/contact">Contact</a></li>
                    <?php if(Application::$app->user): ?>
                        <?php for($i=0; $i<100; $i++)echo "&nbsp";?>
                        <li> <a href="/logout"><?php echo Application::$app->user->name; ?> Logout</a></li>
                    <?php else: ?>
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>



    <div class="container">
        <?php if (Application::$app->session->getFlash('success')): ?>
            <div class="alert alert-success">
                <?php echo Application::$app->session->getFlash('success');?>
            </div>
        <?php endif; ?>
        {{content}}
    </div>
     


    <footer  style="padding:50px 0;color:#f0f9ff;background-color:#282d32">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3 item">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Hosting</a></li>
                    </ul>
                </div>
            </div>
            <p class="copyright">Company Name © 2021</p>
        </div>
    </footer>
</body>

</html>
 

<h1




