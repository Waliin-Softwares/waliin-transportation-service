<h1> Home </h1>


<?php if($model): ?>
    <h3> Welcome <?php 
        echo $model->getName()
    ?> </h3>
<?php else: ?>
    <h3> Welcome </h3>
<?php endif; ?>