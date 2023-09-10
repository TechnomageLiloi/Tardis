<link href="<?php echo ROOT_URL; ?>/Engine/API/Application/Diary/Show/Style.css" rel="stylesheet" />

<div id="application-diary-show" class="stylo">

    <div class="controls">
        <a href="javascript:void(0)" onclick="Interstate60.Application.Diary.show();">Show</a> at
        <input type="date" name="key_day" value="<?php echo $entity->getKey(); ?>">
        <a href="javascript:void(0)" onclick="Interstate60.Application.Diary.edit();">Edit</a>
    </div>

    <hr/>

    <h1 class="wrap-title">
        <?php echo $entity->getTitle(); ?>
    </h1>

    <div class="data">
        <?php echo $entity->getData(); ?><br/>
    </div>

    <?php echo $entity->parse(); ?>

    <hr/>
</div>