<link href="<?php echo ROOT_URL; ?>/Engine/API/Application/Tickets/Edit/Template.css" rel="stylesheet" />

<div id="artifacts-atoms-edit">
    <a href="javascript:void(0)" onclick="Interstate60.Application.Tickets.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Interstate60.Application.Tickets.collection(true);">Cancel</a>
    <hr/>
    <table>
        <tr><td style="width: 10%;">Title</td><td><input type="text" name="title" value="<?php echo $entity->getTitle(); ?>" /></td></tr>

        <tr><td>Start</td><td>
            <input type="text" name="start" value="<?php echo $entity->getStart(); ?>" />
            <a href="javascript:void(0)" onclick="$('#artifacts-atoms-edit [name=start]').val('<?php echo date("Y-m-d H:i:s"); ?>');">Now</a>
            <a href="javascript:void(0)" onclick="$('#artifacts-atoms-edit [name=start]').val('<?php echo date("Y-m-d"); ?> 00:00:00');">Today</a>
        </td></tr>

        <tr><td>Finish</td><td>
            <input type="text" name="finish" value="<?php echo $entity->getFinish(); ?>" />
            <a href="javascript:void(0)" onclick="$('#artifacts-atoms-edit [name=finish]').val('<?php echo date("Y-m-d H:i:s"); ?>');">Now</a>
        </td></tr>

        <tr><td>Link</td><td><input type="text" name="link" value="<?php echo $entity->getLink(); ?>" /></td></tr>

        <tr><td>Status</td><td>
            <select name="status">
                <?php foreach($statuses as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if($entity->getStatus() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>

        <tr><td>Difficulty</td><td>
            <select name="difficulty">
                <?php foreach($difficulties as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if($entity->getDifficulty() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>

        <tr><td>Program</td><td><textarea name="program"><?php echo $entity->getProgram(); ?></textarea></td></tr>

    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Interstate60.Application.Tickets.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Interstate60.Application.Tickets.collection(true);">Cancel</a>
</div>