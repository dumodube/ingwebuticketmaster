<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>



<?php echo form_open_multipart('categories/create');  ?>
    <div class="form-group">
        <label for='name'>Name</label>
        <input type="text" class="form-control" name='name' id='name'>
    </div>
    <button type='submit' class="btn">Submit</button>

</form>