


<div class="container-fluid text-center ">
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs">
       <?php if($model): ?>
            <?php if($model->isSuper()): ?>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"> <a href="/profile"> Update Profile </a> </li>
                <li> <a href="/changepassword"> Change Password </li>
                <li> <a href="/addmanager"> Add Manager </a> </li>
            </ul>
            <?php elseif($model->isManager()): ?>
            <ul class="nav nav-pills nav-stacked">
               <li class="active"> <a href="/profile"> Update Profile </a> </li>
                <li><a href="/changepassword"> Change Password </a> </li>
                <li> <a href=" /addoffice"> Create Office </a> </li>
                <li> <a href=" /addofficer"> Add Officer </a> </li>
                <li> <a href=" /addbus"> Add Bus </a> </li>
           </ul>
            <?php elseif($model->isOfficer()): ?>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"> <a href="/profile"> Update Profile </a> </li>
                <li> <a href="/changepassword"> Change Password </a> </li>
                <li><a href=" /addemployee"> Add Employee </a> </li>
                <li> <a href=" /addroute"> Create Route </a> </li>
           </ul>
            <?php elseif($model->isEmployee()): ?>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"> <a href="/profile"> Update Profile </a> </li>
                    <li> <a href="/changepassword"> Change Password </a> </li>
                    <li> <a href=" /addjounrney"> Create Journey </a> </li>
                    <li> <a href=" /reserveticket"> Reserve Ticket </a> </li>
                </ul>
            <?php else: ?>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"> <a href="/profile"> Update Profile </a> </li>
                    <li> <a href="/changepassword"> Change Password </a> </li>
                    <li> <a href=" /reserveticket"> Reserve Ticket </a> </li>
                </ul>
            <?php endif; ?>
        <?php endif; ?>


    </div>
    <div class="col-sm-8 text-left">
        <?php if($model): ?>
            <?php if($model->isSuper()): ?>
                <h2> Welcome <?= $model->getName() ?> </h2>
                <p> You are a super user </p>
            <?php elseif($model->isManager()): ?>
                <h2> Welcome <?= $model->getName() ?> </h2>
                <p> You are an Manager </p>
            <?php elseif($model->isOfficer()): ?>
                <h2> Welcome <?= $model->getName() ?> </h2>
                <p> You are an officer user </p>
            <?php elseif($model->isEmployee()): ?>
                <h2> Welcome <?= $model->getName() ?> </h2>
                <p> You are an employee user </p>
            <?php else: ?>
                <h2> Welcome <?= $model->getName() ?> </h2>
                <p> You are a regular user </p>
            <?php endif; ?>
        <?php else: ?>
             <h3> Welcome </h3>
        <?php endif; ?>
      <p>Waliin Transporation service provides the best transportation service you could ever imagine</p>
      <hr>
      <h3>Services</h3>
      <p>List of services</p>
    </div>
  </div>
</div>
