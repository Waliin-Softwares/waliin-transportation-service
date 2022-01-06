<?php
    use app\core\form\Form;
?>
<h2 class="text-center">Update Profile</h2>
<div class="row">
    <div class="container">
        <h2> Change Password </h2>
        <div class="jumbotron">
            <div class="row">
                <div class="col">
                    <?php $form = Form::begin('/changepassword', 'post'); ?>
                        <?php echo $form->field($model, 'oldPassword', 'password'); ?>
                        <?php echo $form->field($model, 'newPassword', 'password'); ?>
                        <?php echo $form->field($model, 'confirmPassword', 'password'); ?>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                    <?php Form::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
