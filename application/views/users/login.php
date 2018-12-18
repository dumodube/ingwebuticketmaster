<?php echo form_open('users/login'); ?>
    <div class="center">
        <div class="col-md-4 col-md-offset-4">
            <h1 class="text-center"><?php echo $title; ?></h1>
            <div class="input-field">
                <input type="text" class="form-control" name='username' placeholder='Enter Username' required autofocus>
            </div>
            <div class="input-field">
                <input type="password" class="form-control" name='password' placeholder='Enter Password' required autofocus>
            </div>
            <button type='submit' class="btn btn-primary btn-block">Login</button>
        
        </div>
    </div>
<?php echo form_close(); ?>