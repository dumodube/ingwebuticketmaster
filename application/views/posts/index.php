<script>
<!--
function timedRefresh(timeoutPeriod) {
	setTimeout("location.reload(true);",timeoutPeriod);
}

window.onload = timedRefresh(1000000);

//   -->
</script>



<h2 class='red-text'><?= $title ?></h2>

  
<?php foreach($posts as $post) : ?>
    <h3 class='post-title'><?php echo $post['title']; ?></h3>


    <div class="row">
        
        <div class="col-md-9">
            <b>
                <div class="text-danger">#<?php echo $post['id']; ?></div><?php echo word_limiter($post['body'], 60); ?></b><br><br>
            <small class='post-date'> Posted on :<?php echo $post['created_at']; ?></small><strong> in <?php echo $post['name'];?></strong>
            <br><br>
            <p><a class='btn btn-primary' href="<?php echo site_url('/posts/' . $post['slug']); ?>">Edit Ticket</a></p>
        </div>
    </div>
    <hr>
    
<?php endforeach; ?>

</div>



 <?php if($this->session->userdata('logged_in')) :?>
    <div class="fixed-action-btn">
        <a href="<?php echo base_url(); ?>posts/create" class="btn-floating red">
            <i class="large material-icons">mode_edit</i>
        </a>
    </div>
<?php endif; ?>    
<!-- <div class="pagination">
<?php echo $this->pagination->create_links();?>
</div> -->
