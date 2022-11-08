<?php foreach ($results as $res) : ?>
    <a href="<?php echo (PATH) . '/filmpage/' . $res['id']  ?>">
        <li class="list-group-item">
            <div class="profile-films">
                <img src="<?php echo $res['img'] ?>" alt="">
                <h5 class="ms-2"><?php echo $res['title'] ?> (<?php echo $res['date'] ?>)</h5>
            </div>
        </li>
    </a>
<?php endforeach; ?>