<style>
    #lesson-schedule table
    {
        width: 100%;
    }

    #lesson-schedule table tr:hover
    {
        background-color: #ffffbd;
    }

    #lesson-schedule table th
    {
        text-align: center;
    }

    #lesson-schedule table th,
    #lesson-schedule table td
    {
        width: 14%;
        border-bottom: silver 1px dashed;
        border-right: silver 1px dashed;
        font-size: x-small;
    }

    #lesson-schedule table th:first-child
    {
        width: 100px;
        text-align: right;
    }

    #lesson-schedule .lesson
    {
        border: gray 1px solid;
        margin-bottom: 1px;
        border-radius: 2px;
        padding: 1px;
        background-color: white;
    }
</style>
<div id="lesson-schedule">
    <table>
        <tr>
            <th></th>
            <?php for($day=1;$day<=7;$day++): ?>
            <th><?php echo $days[$day]; ?></th>
            <?php endfor; ?>
        </tr>
        <?php for($hour=0;$hour<24;$hour++): ?>
        <tr>
            <th><?php echo $hour; ?>:00</th>
            <?php for($day=1;$day<=7;$day++): ?>
            <td>
                <?php foreach($schedule[$day][$hour] as $entity): ?>
                <div class="lesson">
                    <a href="javascript:void(0)" onclick="Tardis.Lessons.collection('<?php echo $entity->getKeyProblem(); ?>')">
                        <?php echo $entity->getComment(); ?>
                    </a>
                </div>
                <?php endforeach; ?>
            </td>
            <?php endfor; ?>
        </tr>
        <?php endfor; ?>
    </table>
</div>