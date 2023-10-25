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
    <a href="javascript:void(0)" class="butn" onclick="Tardis.Degrees.show('<?php echo $uid; ?>');">Show degree</a>
    <h1>Subjects:</h1>
    <?php foreach($group as $id_type => $collection): ?>
        <h2>&blacktriangleright; <?php echo $types[$id_type]; ?></h2>
        <a href="javascript:void(0)" onclick="Tardis.Problems.create('<?php echo $degree->getKey(); ?>', '<?php echo $id_type; ?>', '<?php echo $uid; ?>')">Create</a>
        <table>
            <?php foreach($collection as $key_problem => $entity): ?>
            <tr>
                <td>
                    <a style="color: black;" href="javascript:void(0)" onclick="Tardis.Problems.show('<?php echo $key_problem; ?>')">
                        <?php echo $entity->getTitle(); ?>
                    </a>
                </td>
                <td style="text-align: right; width: 100px;"><?php echo $entity->getStatusTitle(); ?></td>
                <td style="text-align: right; width: 100px;"><?php echo $entity->getMark(); ?></td>
                <td style="text-align: right; width: 300px;">
                    <a href="javascript:void(0)" onclick="Tardis.Lessons.collection('<?php echo $key_problem; ?>')">Lessons</a>
                    &diams;
                    <a href="javascript:void(0)" onclick="Tardis.Problems.edit('<?php echo $key_problem; ?>', '<?php echo $uid; ?>')">Edit</a>
                    &diams;
                    <a href="javascript:void(0)" onclick="Tardis.Problems.remove('<?php echo $key_problem; ?>', '<?php echo $uid; ?>')">Remove</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endforeach; ?>
</div>