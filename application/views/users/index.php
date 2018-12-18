<u><h2><?= $title; ?></h2></u>

<ul class="list-group">
    <?php foreach($users as $user) : ?>

        <li class="list-group-item">
                <a href="<?php echo site_url('users/posts/' . $user['id']);?>">
                    <h5> <?php echo $user['name']; ?></h5>
                </a>
               
         
        </li>

    <?php endforeach; ?>
</ul>