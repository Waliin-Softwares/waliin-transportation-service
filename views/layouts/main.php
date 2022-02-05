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
      <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
  </style>
</head>

<body style="background-image:url('static/background.jpg'); background-size:cover; background-repeat:no-repeat;">

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Waliin Transporation Service</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(Application::$app->user): ?>
                    <li><a href="/"> <?php echo " ". Application::$app->user->getName() ?> </a></li>
                    <li> <a href="/logout"> Logout</a></li>
                <?php else: ?>
                    <li><a href="/login"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                    <li><a href="/register"><span class="glyphicon glyphicon-log-in"></span> Register</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>


    <div class="container">
        <?php if (Application::$app->session->getFlash('success')): ?>
            <div class="alert alert-success">
                <?php echo Application::$app->session->getFlash('success');?>
            </div>
        <?php endif; ?>
    </div>
    {{content}}


    <footer class="container-fluid text-center">
        <div class="container">
            <div class="col-sm-6 col-md-3 item">
                <h3>Services</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Contact us</a></li>
                </ul>
                <p class="text-muted">Copyright &copy; 2022 Waliin Transportation Service</p>
            </div>
        </div>

    </footer>
</body>

</html>
