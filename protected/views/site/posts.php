<?php
    $postId = CHtml::encode($data->id);
    $postTitle = CHtml::encode($data->title);
    $postimage = CHtml::encode($data->image);
    $postCreateTime = CHtml::encode($data->create_time);
    $postUpdateTime = CHtml::encode($data->update_time);
?>

<div id='<?php echo $postId; ?>' class='post'>
    <img src='./uploads/<?php echo $postimage; ?>'/>
    <div class='postInfo'>
        <h4><a href='index.php?r=post/view&id=<?php echo $postId; ?>'><?php echo $postTitle ?></a></h4>
        <p>Criado em <?php echo $postCreateTime; ?></p>
        <p>Atualizado em <?php echo $postUpdateTime; ?></p>
    </div>
</div>