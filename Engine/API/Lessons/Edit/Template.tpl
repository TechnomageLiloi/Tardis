<style>
    #blueprint-edit input,
    #blueprint-edit select,
    #blueprint-edit textarea
    {
        width: 50%;
    }

    #blueprint-edit textarea
    {
        height: 300px;
    }
</style>
<div id="blueprint-edit">
    <a href="javascript:void(0)" onclick="Tardis.Lessons.save('<?php echo $entity->getKey(); ?>', '<?php echo $entity->getKeyProblem(); ?>');">Save</a>
    <hr/>
    <table style="width: 100%;">
        <tr>
            <th>Name</th>
            <th>Value</th>
        </tr>
        <tr><td>Comment</td><td><input type="text" name="comment" value="<?php echo $entity->getComment(); ?>"/></td></tr>
        <tr><td>Mark</td><td><input type="text" name="mark" value="<?php echo $entity->getMark(); ?>"/></td></tr>
        <tr><td>Start</td><td>
            <input type="text" name="start" value="<?php echo $entity->getStart(); ?>"/>
            <a href="javascript:void(0)" onclick="$('#blueprint-edit [name=start]').val('0000-00-00 00:00:00');">Later</a> &diams;
            <a href="javascript:void(0)" onclick="$('#blueprint-edit [name=start]').val('<?php echo date('Y-m-d H:i:s'); ?>');">Now</a>
        </td></tr>
        <tr><td>Finish</td><td>
            <input type="text" name="finish" value="<?php echo $entity->getFinish(); ?>"/>
                <a href="javascript:void(0)" onclick="$('#blueprint-edit [name=finish]').val('0000-00-00 00:00:00');">Later</a> &diams;
            <a href="javascript:void(0)" onclick="$('#blueprint-edit [name=finish]').val('<?php echo date('Y-m-d H:i:s'); ?>');">Now</a>
        </td></tr>

        <tr><td>Status</td><td>
            <select name="status">
                <?php foreach($statuses as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if($entity->getStatus() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>

        <tr><td>Data</td><td><textarea name="data"><?php echo $entity->getData(); ?></textarea></td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Tardis.Lessons.save('<?php echo $entity->getKey(); ?>', '<?php echo $entity->getKeyProblem(); ?>');">Save</a>
</div>