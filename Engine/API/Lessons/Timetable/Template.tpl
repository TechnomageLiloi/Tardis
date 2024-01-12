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
        <table>
            <tr>
                <th style="border-right: silver 1px dashed; width: 50%;">
                    <h3>Problems</h3>
                </th>
                <th>
                    <h3>Lessons</h3>
                </th>
            </tr>
            <tr>
                <td style="border-right: silver 1px dashed;vertical-align: top;">

                    <table class="inner-table">
                        <tr>
                            <th>Problem</th>
                            <th>Status</th>
                            <th>Percent</th>
                            <th style="text-align: right;">Actions</th>
                        </tr>
                        <?php foreach($problems[$key] as $key_problem => $entity): ?>
                        <tr>
                            <td>
                                <a style="color: black;" href="javascript:void(0)" onclick="Rune.Problems.show('<?php echo $key_problem; ?>')">
                                    <?php echo $entity->getTitle(); ?>
                                </a>
                            </td>
                            <td style="width: 100px;"><?php echo $entity->getStatusTitle(); ?></td>
                            <td style="width: 100px;"><?php echo $entity->getMark(); ?>%</td>
                            <td style="text-align: right; width: 300px;">
                                <a href="javascript:void(0)" onclick="Rune.Problems.edit('<?php echo $key_problem; ?>', '<?php echo $uid; ?>')">Edit</a>
                                &diams;
                                <a href="javascript:void(0)" onclick="Rune.Problems.remove('<?php echo $key_problem; ?>', '<?php echo $uid; ?>')">Remove</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>

                </td>
                <td style="vertical-align: top;">

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
                                <a href="javascript:void(0)" onclick="Rune.Lessons.edit('<?php echo $entity->getKey(); ?>')">Edit</a> &diams;
                                <a href="javascript:void(0)" onclick="Rune.Lessons.remove('<?php echo $key_lesson; ?>')">Remove</a> &diams;
                                <a href="javascript:void(0)" onclick="Rune.Lessons.update('<?php echo $entity->getKey(); ?>');">Enable</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>

                </td>
            </tr>
        </table>
    <?php endforeach; ?>

</div>