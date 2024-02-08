<link href="<?php echo ROOT_URL; ?>/Engine/API/Plan/Show/Style.css" rel="stylesheet" />
<div id="plan-show" class="stylo">
    <h1 id="plan" class="wrap-title">
        Dissertation
    </h1>
    <?php if($collection->count()): ?>
        <h2 class="wrap-title" id="menu">
            0. Menu
        </h2>

        <ul style="list-style-type: none;">
        <?php foreach($collection as $entity): ?>
            <li>
                <a href="#<?php echo $entity->getUid(); ?>"><?php echo $entity->getKey(); ?>. <?php echo $entity->getTitle(); ?></a>
            </li>
        <?php endforeach; ?>
        </ul>

        <?php foreach($collection as $entity): ?>
            <h2 id="<?php echo $entity->getUid(); ?>" class="wrap-title">
                <?php echo $entity->getKey(); ?>. <?php echo $entity->getTitle(); ?>
            </h2>

            <?php echo $entity->parseProgram(); ?>

            <a href="#menu">&larr; Back to menu</a>
        <?php endforeach; ?>
    <?php endif; ?>
</div>