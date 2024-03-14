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

    #problem-group .lesson.in-hand
    {
        background-color: #fff6ce;
    }

    #problem-group .lesson.complete
    {
        background-color: #ceffd0;
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

    #problem-group .horcrux
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

    <div class="horcrux">
        <h2>Horcrux: <?php echo $horcrux->getTitle(); ?></h2>
        <hr/>
        <a href="javascript:void(0)" class="butn" onclick="TARDIS.Horcruxes.edit('<?php echo $horcrux->getKey(); ?>')">Edit</a>
        <a href="javascript:void(0)" class="butn" onclick="TARDIS.Horcruxes.done('<?php echo $horcrux->getKey(); ?>', 3)">Success</a>
        <a href="javascript:void(0)" class="butn" onclick="TARDIS.Horcruxes.done('<?php echo $horcrux->getKey(); ?>', 4)">Failure</a>
        <hr/>
        <div style="text-align: left;">
            <?php echo $horcrux->parseSummary(); ?>
        </div>
    </div>

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

    <div class="wrap-butn" style="text-align: center;">
        <input type="date" name="key_date" value="<?php echo $keyDate; ?>">
        <select name="key_position">
            <?php foreach($positions as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if($key == $keyPosition): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
            <?php endforeach; ?>
        </select>
        <a href="javascript:void(0);" onclick="TARDIS.Lessons.edit();" class="butn">Edit</a>
    </div>

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
            You are time parasite now! What a shame!
        </div>
    <?php endif; ?>

    <?php if($timetable): ?>

        <hr/>

        <div style="text-align: center;">
            <h3>
                <?php echo $timetable->getComment(); ?>
                <br/>
                Mark: <?php echo $timetable->getMark(); ?>
            </h3>

            <?php echo $timetable->getData(); ?>
        </div>

    <?php endif; ?>
</div>