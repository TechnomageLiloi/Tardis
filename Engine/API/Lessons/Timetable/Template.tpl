<style>
    #problem-group .lesson
    {
        border: gray 1px solid;
        border-radius: 5px;
        margin-bottom: 5px;
    }

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

    #problem-group .problem
    {
        background-color: #e3f0ff;
        padding: 5px;
        border: gray 1px solid;
        border-radius: 5px;
        margin-bottom: 5px;
    }

    #problem-group .ticket
    {
        background-color: #cbffbd;
        padding: 5px;
        border: gray 1px solid;
        border-radius: 5px;
        margin-bottom: 5px;
    }

    #problem-group .flag
    {
        background-color: #04ffea;
        border: gray 1px solid;
        color: #000000;
        margin-right: 3px;
        padding: 1px;
        border-radius: 5px;
    }

    #problem-group .parasite
    {
        background-color: red;
        color: yellow;
        padding: 5px;
        text-align: center;
        margin-bottom: 5px;
        font-size: x-large;
        border-radius: 5px;
    }

    #problem-group .lesson.to-do
    {
        background-color: #dcdcdc;
    }
</style>
<div id="problem-group">
    <h1 style="text-align: center;">
        Current Karma: <?php echo $total; ?>
    </h1>

    <?php $active = 0; ?>

    <?php foreach($problems as $problem): ?>
        <?php if(!$problem->isInHand()) continue; ?>
        <?php ++$active; ?>
        <div class="problem">
            <a href="javascript:void(0)" class="butn" onclick="TARDIS.Problems.edit('<?php echo $problem->getKey(); ?>')">Edit</a>
            <?php echo $problem->getTitle(); ?>
        </div>
    <?php endforeach; ?>

    <?php foreach($tickets as $ticket): ?>
        <?php if(!$ticket->isInHand()) continue; ?>
        <?php ++$active; ?>
        <div class="ticket">
            <a href="javascript:void(0)" class="butn" onclick="TARDIS.Tickets.edit('<?php echo $ticket->getKey(); ?>')">Edit</a>
            <?php echo $ticket->getTitleWithFlags(); ?>
        </div>
    <?php endforeach; ?>

    <?php if(!$active): ?>
        <div class="parasite">
            You have a time parasite now! What a shame!
        </div>
    <?php endif; ?>

    <?php foreach($lessons as $keyDegree => $entity): ?>
        <?php if($entity->isCompleted()) continue; ?>
        <div class="lesson <?php echo $entity->getStatusClass(); ?>">

            <?php $key = $entity->getKey(); ?>
            <h3 style="text-align: center;">
                Lesson <?php echo $degrees[$keyDegree]; ?> /
                Status: <?php echo $statuses[$entity->getStatus()]; ?>
            </h3>
            <div style="text-align: center;">
                <a href="javascript:void(0)" onclick="TARDIS.Lessons.edit('<?php echo $entity->getKey(); ?>');" class="butn">Edit lesson</a>
                <a href="javascript:void(0)" onclick="TARDIS.Problems.create('<?php echo $keyDegree; ?>');" class="butn">Create problem</a>
                <a href="javascript:void(0)" onclick="TARDIS.Tickets.create('<?php echo $key; ?>');" class="butn">Create ticket</a>
            </div>
            <table class="inner-table">
                <tr style="font-weight: bold;">
                    <td style="width: 80%;">
                        <?php echo $entity->getTitle(); ?>
                    </td>
                    <td>

                    </td>
                    <td style="width: 5%;text-align: right;">

                    </td>
                </tr>
                <tr style="font-weight: bold;">
                    <td style="width: 80%;">
                        Problems
                    </td>
                    <td>

                    </td>
                    <td style="width: 5%;text-align: right;">

                    </td>
                </tr>
                <?php foreach($problems as $problem): ?>
                    <?php if($keyDegree != $problem->getKeyDegree()) continue; ?>
                    <tr>
                        <td style="width: 80%;">
                            <input type="checkbox" disabled <?php if($problem->isDone()): ?>checked="checked"<?php endif; ?>> / <?php echo $problem->getTitle(); ?>
                        </td>
                        <td>
                            <?php echo $problemStatuses[$problem->getStatus()]; ?>
                        </td>
                        <td style="width: 5%;text-align: right;">
                            <a href="javascript:void(0)" class="butn" onclick="TARDIS.Problems.edit('<?php echo $problem->getKey(); ?>')">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr style="font-weight: bold;">
                    <td style="width: 80%;">
                        Tickets
                    </td>
                    <td>

                    </td>
                    <td style="width: 5%;text-align: right;">

                    </td>
                </tr>
                <?php foreach($tickets as $ticket): ?>
                    <?php if($key != $ticket->getKeyLesson()) continue; ?>
                    <tr>
                        <td style="width: 80%;">
                            <?php echo $ticket->getStart(); ?> - <?php echo $ticket->getFinish(); ?> / <?php echo $ticket->getTitleWithFlags(); ?>
                        </td>
                        <td>
                            <?php echo $ticket->getStatusTitle(); ?> / <?php echo $ticket->getKarma(); ?>
                        </td>
                        <td style="width: 5%;text-align: right;">
                            <a href="javascript:void(0)" class="butn" onclick="TARDIS.Tickets.edit('<?php echo $ticket->getKey(); ?>')">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    <?php endforeach; ?>
</div>