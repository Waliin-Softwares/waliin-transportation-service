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
    <title>Add Officer</title>
</head>

<?php

    $users = $model->findAll(['role' => 'customer']);
    $users = array_values($users);
    $users_array = [];
    foreach($users as $user){
        $users_array[$user->id] = $user->getName();
    }

    $offices = $office->findAll([]);
    $offices = array_values($offices);
    $offices_array = [];
    foreach($offices as $off){
        $offices_array[$off->id] = $off->officeName;
    }

?>

<body>
    <div class="container">
        <h2> Add Officer </h2>
        <div class="jumbotron">
            <div class="row">
                <div class="col">
                    <?php $form = Form::begin('/addofficer', 'post'); ?>
                        <?php echo $form->field($officer, 'userid', 'select', $users_array ) ?>
                        <?php echo $form->field($officer, 'office', 'select', $offices_array ) ?>
                    <button type="submit" class="btn btn-primary">Add</button>
                    <?php Form::end(); ?>
                </div>
            </div>
        </div>
    </div>
</body>