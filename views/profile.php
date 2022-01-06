<!-- update profile page by bootstrap -->
<?php 
    use app\core\form\Form;

?>
    <h2> Update Profile </h2>
         <a href="/changepassword">Change Password</a>
     <div class="container">
         
         <div class="jumbotron">
             <div class="row">
                 <div class="col">
                     <?php $form = Form::begin('/profile', 'post'); ?>
                        <?php echo $form->field($model, 'firstName') ?>
                        <?php echo $form->field($model, 'lastName') ?>
                        <?php echo $form->field($model, 'username') ?>
                        <?php echo $form->field($model, 'email') ?>
                         <?php echo $form->field($model, 'phoneNumber')?>
                         <?php echo $form->field($model, 'address') ?>
                     <button type="submit" class="btn btn-primary">Update</button>
                     <?php Form::end(); ?>
                 </div>
             </div>
         </div>
</div>




