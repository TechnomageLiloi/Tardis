<div id="blueprint-show">
    <h1><?php echo $entity->getTitle(); ?></h1>
    <hr/>
    <a href="javascript:void(0)" onclick="Rune.Degrees.getCollection();">&blacktriangleleft; Back</a> &diams;
    <a href="javascript:void(0)" onclick="Rune.Degrees.edit('<?php echo $entity->getUid(); ?>')">Edit</a> &diams;
    <a href="javascript:void(0)" onclick="Rune.Problems.collection('<?php echo $entity->getUid(); ?>')">Problems list</a>
    <hr/>
    <?php echo $entity->getParse(); ?>
</div>