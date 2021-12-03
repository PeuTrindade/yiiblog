<?php foreach ($coments as $key => $value) { ?>
    <div class='coment'>
        <span><?php echo $value['author']; ?> comentou em <?php echo $value['create_time'];  ?></span>
        <p><?php echo $value['content']; ?></p>
    </div>
<?php } ?>