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
    <?php foreach($types as $key => $value): ?>
        <h3 style="text-align: center;">
            Lesson <?php echo $key; ?>: <?php echo $value; ?>
        </h3>
        <table class="inner-table">
            <?php foreach($lessons[$key] as $key_lesson => $entity): ?>
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
            <?php endforeach; ?>
        </table>
    <?php endforeach; ?>
</div>