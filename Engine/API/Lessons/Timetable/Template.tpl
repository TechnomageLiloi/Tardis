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

    #problem-group table.inner-table td
    {
        border-bottom: silver 1px dashed;
    }

    #problem-group table.inner-table tr:hover
    {
        background-color: #ffffbd;
    }
</style>
<div id="problem-group">
    <?php foreach($types as $key => $value): ?>
        <h1><?php echo $value; ?></h1>
        <table class="inner-table">
            <tr>
                <th>Comment</th>
                <th>Status</th>
                <th>Karma</th>
                <th style="text-align: right;">Actions</th>
            </tr>
            <?php foreach($lessons[$key] as $key_lesson => $entity): ?>
            <tr>
                <td>
                    <?php echo $entity->getTitle(); ?>
                </td>
                <td><?php echo $statuses[$entity->getStatus()]; ?></td>
                <td><?php echo $entity->getMark(); ?></td>
                <td style="text-align: right;">
                    <a href="javascript:void(0)" onclick="TARDIS.Lessons.edit('<?php echo $entity->getKey(); ?>')">Edit</a> &diams;
                    <a href="javascript:void(0)" onclick="TARDIS.Lessons.remove('<?php echo $key_lesson; ?>')">Remove</a> &diams;
                    <a href="javascript:void(0)" onclick="TARDIS.Lessons.update('<?php echo $entity->getKey(); ?>');">Enable</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endforeach; ?>
</div>