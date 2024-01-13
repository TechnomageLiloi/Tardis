<style>
    #problem-group table
    {
        width: 100%;
    }

    #problem-group table th,
    #problem-group table td
    {
        text-align: left;
    }

    #problem-group table.inner-table tr:hover
    {
        background-color: #ffffbd;
    }
</style>
<div id="problem-group">
    <h1 style="text-align: center;">
        <?php echo date('Y-m-d (H:i:s)'); ?>
    </h1>
    <?php foreach($lessons as $type => $entity): ?>
        <?php $key = $entity->getKey(); ?>
        <h3 style="text-align: center;">
            Lesson <?php echo $type; ?>: <?php echo $entity->getTypeTitle(); ?>
        </h3>
        <div style="text-align: center;">
            <a href="javascript:void(0)" onclick="TARDIS.Problems.create('<?php echo $key; ?>')" class="butn">Create problem</a>
        </div>
        <table class="inner-table">
            <tr>
                <td style="width: 80%;">
                    <?php echo $entity->getTitle(); ?>
                </td>
                <td>
                    <?php echo $statuses[$entity->getStatus()]; ?>
                </td>
                <td style="width: 5%;">
                    <?php echo $entity->getMark(); ?>
                </td>
                <td style="width: 5%;text-align: right;">
                    <a href="javascript:void(0)" onclick="TARDIS.Lessons.edit('<?php echo $entity->getKey(); ?>')">Edit</a>
                </td>
            </tr>
            <?php foreach($problems as $problem): ?>
                <?php if($key != $problem->getKeyLesson()) continue; ?>
                <tr>
                    <td style="width: 80%;">
                        <input type="checkbox" disabled <?php if($problem->isDone()): ?>checked="checked"<?php endif; ?>> <?php echo $problem->getStart(); ?> / <?php echo $problem->getTitle(); ?>
                    </td>
                    <td>
                        <?php echo $statuses[$entity->getStatus()]; ?>
                    </td>
                    <td style="width: 5%;">

                    </td>
                    <td style="width: 5%;text-align: right;">
                        <a href="javascript:void(0)" onclick="TARDIS.Problems.edit('<?php echo $problem->getKey(); ?>')">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endforeach; ?>
</div>