<link href="<?php echo ROOT_URL; ?>/Engine/API/Application/Diary/Show/Style.css" rel="stylesheet" />

<div id="application-diary-show" class="stylo">

    <h1 class="wrap-title">
        <?php echo $entity->getTitle(); ?>
    </h1>
    <?php echo $entity->getStatusTitle(); ?><br/>
    <a href="javascript:void(0)" onclick="Tardis.Application.Plans.edit('<?php echo $entity->getKey(); ?>');">Edit</a>

    <hr/>

    <?php echo $entity->parse(); ?>
</div>