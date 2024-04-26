<style>
    #blueprint-edit input,
    #blueprint-edit select,
    #blueprint-edit textarea
    {
        width: 50%;
    }

    #blueprint-edit textarea
    {
        height: 300px;
    }
</style>
<div id="blueprint-edit">
    <a href="javascript:void(0)" onclick="I60.Plan.edit('<?php echo $entity->getKey(); ?>');" class="butn">Edit</a>
    <?php echo $entity->parsePlan(); ?>
</div>