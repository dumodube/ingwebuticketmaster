<h2><?= $title;?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/create'); ?>
    <div class="input-field">
        <label>Title</label>
        <input type="text" class="form-control" placeholder='Add title' name='title'>
    </div><br>
    <div class="input-field">
        <textarea name="body" id="editor1" class='materialize-textarea' placeholder='Add Body' ></textarea>
        <label for="body" class='active'>Message</label>
    </div><br>
    <div class="input-field">
        <label for="category"></label>
        <select name='category_id' class='form-control'>
            <?php foreach($categories as $category):?>
                <option value="<?php echo $category['categories_id'];?>"><?php echo $category['name'];?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="input-field">
        <label for="priority"></label>
        <select name="priority_id" id="" class="form-control">
            <?php foreach($priority as $priorities):?>
                <div class="blue-text"><option value="<?php echo $priorities['priority_id'];?>"><?php echo $priorities['name'];?></option></div>
            <?php endforeach;?>
        </select>
    </div>
    <!--  -->
    <!-- <div class="form-group">
        <label>Upload Image</label>
        <input type="file" class="form-control" name='userfile' size=20>
    </div> -->
    <button type='submit' class='btn btn-success notifcation'>Submit</button>
</form>