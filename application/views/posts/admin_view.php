<script>
<!--
function timedRefresh(timeoutPeriod) {
	setTimeout("location.reload(true);",timeoutPeriod);
}

window.onload = timedRefresh(5000);

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
<div class="pagination">
<?php echo $this->pagination->create_links();?>
</div>
