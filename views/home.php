<h1> Home </h1>


<?php if($model): ?>
    <?php if($model->isSuper()): ?>
        <h2> Welcome <?= $model->getName() ?> </h2>
        <p> You are a super user </p>
        <p> <a href="/addadmin"> Add admin </a> </p>
    <?php elseif($model->isAdmin()): ?>
        <h2> Welcome <?= $model->getName() ?> </h2>
        <p> You are an admin user </p>
        <p> <a href=" /addofficer"> Add Officer </a> </p>
    <?php elseif($model->isOfficer()): ?>
        <h2> Welcome <?= $model->getName() ?> </h2>
        <p> You are an officer user </p>
        <p> <a href=" /addemployee"> Add Employee </a> </p>
        <p> <a href=" /addroute"> Create route </a> </p>
    <?php else: ?>
        <h2> Welcome <?= $model->getName() ?> </h2>
        <p> You are a regular user </p>

    <?php endif; ?>


<?php else: ?>
    <h3> Welcome </h3>
<?php endif; ?>
