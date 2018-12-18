<script>
<!--
function timedRefresh(timeoutPeriod) {
	setTimeout("location.reload(true);",timeoutPeriod);
}

window.onload = timedRefresh(60000);

//   -->
</script>


<div class="card-panel">
<h4><?php echo $post['title'];?></h4>
<small class="post-date">Created on: <?php echo $post['created_at']; ?></small>

 <?php if($this->session->userdata('user_id') == $post['user_id']) : ?>
 <strong> by <?php echo $post['user_name'];?></strong>
 <?php endif; ?>

<br><br>
<div class='post-body'>
    <b><?php echo $post['body'];?></b>
    
</div>
<br>
<br>
<?php if($this->session->userdata('user_id') == $post['user_id']) : ?>
    
    <a class='btn pull-left' href="<?php echo base_url();?>posts/edit/<?php echo $post['id'];?>">Edit</a>

     <!-- <?php echo form_open('/posts/delete/' . $post['id']); ?>
        <input type="submit" value='Delete' class='btn red'>
    </form> -->

<?php endif; ?>

</div>


<div class="card-panel">
<h3>Solutions</h3>
<div class="table-striped">
    <?php if($comments) :?>
        <?php foreach($comments as $comment) :?>
        <ul>
            <li class='card-panel teal lighten-3'><strong><?php echo $comment['body'];?>   [by <strong><?php echo $comment['name'];?></strong>]</strong></li>
        </ul>
            
        <?php endforeach;?>
        <?php else :?>

    <?php endif ;?>

</div>

<br>
<br>

<h5>Add Comments</h5>
<?php echo validation_errors();?>
<?php echo form_open('comments/create/' . $post['id']); ?>
    <div class="input-field">
        <label for="name">Name</label>
        <input type="text" name='name'>
    </div>
    <div class="input-field">
        <label for="body">Message</label>
        <textarea type="text" name='body' class='materialize-textarea'></textarea>
    </div>
    <input type="hidden" name="id" value='<?php echo $post['id'];?>'>
    <button class="btn" type='submit'>Submit</button>
</form>
</div>

</div>

