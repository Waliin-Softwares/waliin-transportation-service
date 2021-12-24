<?php 

?>

<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Login</title>
</head>

<body>
    <h2> Login </h2>
    <div class="contaner">
        <div style="background-color:gray">
            <div style="padding-left:30%">
                <form action="/login" method="post" >
                    <label for="email">Email: </label>
                    <div style="padding-left:0%">
                        <input type="text" name="email" id="email" size="25">
                    </div>
                    <br>
                    <label for="password">Password: </label>
                    <div style="padding-left:0%">
                        <input type="password" name="password" id="password" size="25">
                    </div>
                    <br>
                    <input type="submit" id="submit" value="Login">
                </form>
            </div>
        </div>
    </div>
</body>