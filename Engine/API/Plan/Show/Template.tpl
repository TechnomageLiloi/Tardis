<style>
    #plan-show .head
    {
        text-align: center;
    }
</style>
<div id="plan-show">
    <div class="head">
        <a href="javascript:void(0)" onclick="I60.Plan.edit('<?php echo $entity->getKey(); ?>');" class="butn">Edit</a>
        <h1><?php echo $entity->getKey(); ?></h1>
    </div>
    <hr/>
    <h3>
        <input type="checkbox" disabled="disabled" <?php echo $entity->getDone() ? 'checked': ''; ?>>
        Daily goal: <?php echo $entity->getGoal(); ?>
    </h3>
    <hr/>
    <?php echo $entity->parsePlan(); ?>
</div>