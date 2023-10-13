<div id="blueprint-show">
    <h1><?php echo $entity->getTitle(); ?></h1>
    <hr/>
    <a href="javascript:void(0)" onclick="Tardis.Degrees.edit('protos')">Edit</a> &diams;
    <a href="javascript:void(0)" onclick="Tardis.Problems.collection('protos')">Problems list</a> &diams;
    <a href="javascript:void(0)" onclick="Tardis.Lessons.schedule('<?php echo gmdate('Y-m-d'); ?>')">Schedule</a>
    <hr/>
    <?php echo $entity->getParse(); ?>
</div>