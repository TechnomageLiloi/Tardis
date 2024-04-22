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

    #lesson-schedule .artifact
    {
        border: gray 1px solid;
        margin-bottom: 1px;
        border-radius: 2px;
        padding: 1px;
        background-color: white;
    }

    #lesson-schedule .failure
    {
        background-color: #ffeeee;
    }

    #lesson-schedule .to-do
    {
        background-color: #e2edf8;
    }

    #lesson-schedule .in-hand
    {
        background-color: #fffeb3;
    }

    #lesson-schedule .success
    {
        background-color: #dbffd5;
    }

    #lesson-schedule .continue
    {
        background-color: #f8cdfd;
    }
</style>
<div id="lesson-schedule">
    <table>
        <tr>
            <th></th>
            <?php for($day=1;$day<=7;$day++): ?>
            <th><?php echo $days[$day]; ?> / <?php echo $dates[$day]; ?></th>
            <?php endfor; ?>
        </tr>
        <?php foreach($schedule as $key => $row): ?>
            <tr>
                <td style="width: 100px;"><?php echo $key; ?>:00</td>

                <?php foreach($row as $day => $cell): ?>
                    <td>
                        <?php foreach($cell as $artifact): ?>
                        <div class="artifact <?php echo $artifact->getStatusClass(); ?>">
                            <a href="javascript:void(0)" onclick="TARDIS.Quests.edit('<?php echo $artifact->getKey(); ?>');" >&blacklozenge;</a>
                            <?php echo $artifact->getTitle(); ?>
                        </div>
                        <?php endforeach; ?>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</div>