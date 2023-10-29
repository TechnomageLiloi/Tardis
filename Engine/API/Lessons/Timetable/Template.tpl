<style>
    #problem-group table
    {
        width: 100%;
    }

    #problem-group table td
    {
        border-bottom: silver 1px dashed;
    }

    #problem-group table tr:hover
    {
        background-color: #ffffbd;
    }

</style>
<div id="problem-group">
    <table>
        <tr>
            <th>Comment</th>
            <th>Status</th>
            <th>Mark</th>
            <th style="text-align: right;">Actions</th>
        </tr>
        <?php foreach($collection as $key_lesson => $entity): ?>
        <tr>
            <td>
                <?php echo $entity->getComment(); ?>
            </td>
            <td><?php echo $statuses[$entity->getStatus()]; ?></td>
            <td><?php echo $entity->getMark(); ?></td>
            <td style="text-align: right;">
                <a href="javascript:void(0)" onclick="Tardis.Lessons.update('<?php echo $entity->getKey(); ?>');">Enable</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>