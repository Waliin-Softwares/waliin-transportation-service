<?php 
    use app\core\form\Form;
?>


<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Create Jounrney</title>
</head>


<?php 

    $bus_array = array();
    $buses = $bus->findAll([]);
    foreach ($buses as $bus) {
        $bus_array[$bus->id] = $bus->sideNumber;
    }
    $route_array = array();
    $routes = $route->findAll([]);
    foreach ($routes as $route) {
        $route_array[$route->id] = $route->source . " to " . $route->destination;
    }

?>

<body>
    <div class="container">
        <h2> Create Jounrney </h2>
        <div class="jumbotron">
            <div class="row">
                <div class="col">
                    <?php $form = Form::begin('/addjounrney', 'post'); ?>
                        <?php echo $form->field($model, 'route', 'select', $route_array ) ?>
                        <?php echo $form->field($model, 'bus', 'select', $bus_array ) ?>
                        <?php echo $form->field($model, 'date', 'date'); ?>
                        <?php echo $form->field($model, 'time', 'time'); ?>
                    <button type="submit" class="btn btn-primary">Add</button>
                    <?php Form::end(); ?>
                </div>
            </div>
        </div>
    </div>
</body>