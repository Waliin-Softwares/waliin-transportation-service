<h1> Home </h1>


<?php if($model): ?>
    <?php if($model->isSuper()): ?>
        <h2> Welcome <?= $model->getName() ?> </h2>
        <p> You are a super user </p>
        <p> <a href="/addmanager"> Add Manager </a> </p>
    <?php elseif($model->isManager()): ?>
        <h2> Welcome <?= $model->getName() ?> </h2>
        <p> You are an Manager </p>
        <p> <a href=" /addoffice"> Create Office </a> </p>
        <p> <a href=" /addofficer"> Add Officer </a> </p>
        <p> <a href=" /addbus"> Add Bus </a> </p>
    <?php elseif($model->isOfficer()): ?>
        <h2> Welcome <?= $model->getName() ?> </h2>
        <p> You are an officer user </p>
        <p> <a href=" /addemployee"> Add Employee </a> </p>
        <p> <a href=" /addroute"> Create Route </a> </p>
    <?php elseif($model->isEmployee()): ?>
        <h2> Welcome <?= $model->getName() ?> </h2>
        <p> <a href=" /addjounrney"> Create Journey </a> </p>
        <p> <a href=" /reserveticket"> Reserve Ticket </a> </p>
        <p> You are an employee user </p>
    <?php else: ?>
        <h2> Welcome <?= $model->getName() ?> </h2>
        <p> You are a regular user </p>
        <p> <a href=" /reserveticket"> Reserve Ticket </a> </p>
    <?php endif; ?>


<?php else: ?>
    <h3> Welcome </h3>
<?php endif; ?>
