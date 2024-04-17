<style>
    #problem-group table
    {
        width: 100%;
    }

    #problem-group table td
    {
        border-bottom: silver 1px dashed;
        padding-bottom: 5px;
    }

    #problem-group table tr:hover
    {
        background-color: #e5ffe0;
    }

    #problem-group .quest
    {
        background-color: #fffce8;
        color: #b80000;
        padding: 5px;
        text-align: center;
        margin-top: 5px;
        margin-bottom: 5px;
        font-size: x-large;
        border-radius: 5px;
        border: maroon 2px solid;
    }
</style>
<div id="problem-group">
    <div class="quest">
        <h2>Quest: <?php echo $quest->getTitle(); ?></h2>
        <hr/>
        <a href="javascript:void(0)" class="butn" onclick="TARDIS.Quests.edit('<?php echo $quest->getKey(); ?>')">Edit</a>
        <a href="javascript:void(0)" class="butn" onclick="TARDIS.Quests.done('<?php echo $quest->getKey(); ?>', 3)">Success</a>
        <a href="javascript:void(0)" class="butn" onclick="TARDIS.Quests.done('<?php echo $quest->getKey(); ?>', 4)">Failure</a>
        <hr/>
        <div style="text-align: left;">
            <?php echo $quest->parseSummary(); ?>
        </div>
    </div>

    <table>
        <tr>
            <th style="text-align: left;">Title</th>
            <th style="text-align: left;">Status</th>
            <th style="text-align: right;">Actions</th>
        </tr>
        <?php foreach($collection as $entity): ?>
        <tr>
            <td><?php echo $entity->getTitle(); ?></td>
            <td><?php echo $entity->getStatusTitle(); ?></td>
            <td style="text-align: right; width: 300px;">
                <a href="javascript:void(0)" onclick="TARDIS.Quests.edit('<?php echo $entity->getKey(); ?>');" class="butn">Edit</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>