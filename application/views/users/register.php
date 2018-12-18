
<?php echo validation_errors(); ?>

<?php echo form_open('users/register') ;?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
        <h1 class="text-center"><?= $title; ?></h1>
            <div class="input-field">
                <label for>Name</label>
                <input type="text" class="form-control" name=name required id='name'>
            </div>
            <div class="input-field">
                <label for='worker'>Employee Number</label>
                <input type="text" class="form-control" name=worker_number id='worker'  required>
            </div>
            <div class="input-field">
                <label for='email'>Email</label>
                <input type="email" class="form-control" name=email id='email'  required autofocus>
            </div>
            <div class="input-field">
                <label for='username'>Username</label>
                <input type="text" class="form-control" name=username id='username' required autofocus>
            </div>
            <div class="input-field">
                <label for='password'>Password</label>
                <input type="password" class="form-control" id='password' name=password >
            </div>
            <div class="input-field">
                <label for='confirm_password'>Confirm Password</label>
                <input type="password" class="form-control" id='confirm_password' name=password2>
            </div>
            <button type='submit' class='btn btn-primary btn-block'>Submit</button>
        </div>
    </div>
<?php echo form_close(); ?>