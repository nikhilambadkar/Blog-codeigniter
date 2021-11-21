<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
<div class="row">
    <div class="col-md-4 col-md-offset-4" >
        <h2 class="text-center"><?= $title ?></h2>
        <div class="from-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name">
        </div>
        <div class="from-group">
            <label>Zipcode</label>
            <input type="text" class="form-control" name="zipcode" placeholder="Zipcode">
        </div>
        <div class="from-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="from-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" placeholder="Username">
        </div>
        <div class="from-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="from-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" name="password2" placeholder="Confrim Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
<?php echo form_close(); ?>