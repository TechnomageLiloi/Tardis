<style>
    /* @todo: extract to LESS file */
    #rune-collection table
    {
        width: 100%;
    }

    #rune-collection table tr:hover
    {
        background-color: #f8f898;
        color: red;
    }

    #rune-collection table tr.start td
    {
        border-bottom: gray 1px dashed;
    }

    #rune-collection .add
    {
        border: gray 1px solid;
        padding: 5px;
        margin: 2px;
        text-align: center;
    }

    #rune-collection .wrap-title
    {
        text-align: center;
    }
</style>
<div id="rune-collection">

    <h1 class="wrap-title">
        Tickets
    </h1>

    <a href="javascript:void(0)" onclick="Interstate60.Application.Tickets.create();">Create ticket</a>
    <table>
        <tr>
            <th>Title</th>
            <th>Period</th>
            <th>Status</th>
            <th>Difficulty</th>
            <th>Problem</th>
            <th>Actions</th>
        </tr>
        <?php foreach($collection as $entity): ?>
            <tr>
                <td><?php echo $entity->getTitle(); ?></td>
                <td><?php echo $entity->getPeriod(); ?></td>
                <td><?php echo $entity->getStatusTitle(); ?></td>
                <td><?php echo $entity->getDifficultyTitle(); ?></td>
                <td style="width: 50%;">
                    <a href="<?php echo $entity->getLink(); ?>" target="_blank">
                        <?php echo $entity->getLink(); ?>
                    </a>
                </td>
                <td>
                    <a href="javascript:void(0);" onclick="navigator.clipboard.writeText('<?php echo $entity->getTitle(); ?>');alert('Copied');">Copy</a> &diam;
                    <a href="javascript:void(0)" onclick="Interstate60.Application.Tickets.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>