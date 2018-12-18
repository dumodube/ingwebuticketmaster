<h2><?= $title; ?></h2>

<ul class="list-group">
    <?php foreach($users as $user) : ?>

        <li class="list-group-item">
            <a href="<?php echo site_url('/admin/categories/posts/'.$category['categories_id']); ?>">
                <?php echo $user['name']; ?>
            </a>
        </li>

    <?php endforeach; ?>
</ul>