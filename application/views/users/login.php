<?php echo form_open('users/login'); ?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1 class="text-center"><?php echo $title ?></h1>
        <div class="from-group">
            <input type="text" name="username" class="from-control" placeholder="Enter Username" require autofocus>
        </div>
        <div class="from-group">
            <input type="password" name="password" class="from-control" placeholder="Enter Password" require autofocus>
        </div>
        <button type="submit" class="btn btn-primary btn-xl">Login</button>
    </div>
</div>

    <?php echo form_close(); ?>