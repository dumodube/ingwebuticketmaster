<div class="center"></div>
<h2><?php echo $post['title'];?></h2>
<small class="post-date">Created on: <?php echo $post['created_at']; ?></small>

 <strong> by <?php echo $post['user_name'];?></strong>



<div class='post-body'>
    <?php echo $post['body'];?>
    
</div>
<?php if($this->session->userdata('user_id') == $post['user_id']) : ?>
    <hr>
    <a class='btn pull-left' href="<?php echo base_url();?>posts/edit/<?php echo $post['slug'];?>">Edit</a>

    <?php echo form_open('/posts/delete/' . $post['id']); ?>
        <input type="submit" value='Delete' class='btn red'>
    </form>

<?php endif; ?>

</div>
