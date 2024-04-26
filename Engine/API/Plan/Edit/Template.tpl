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
    <a href="javascript:void(0)" onclick="I60.Plan.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <hr/>
    <table style="width: 100%;">
        <tr>
            <th>Name</th>
            <th>Value</th>
        </tr>

        <tr><td>Goal</td><td><input type="text" name="goal" value="<?php echo $entity->getGoal(); ?>"/></td></tr>

        <tr><td>Status</td><td>
            <select name="status">
                <?php foreach($statuses as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if($entity->getStatus() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>

        <tr><td>Summary</td><td><textarea name="plan"><?php echo $entity->getPlan(); ?></textarea></td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="I60.Plan.save('<?php echo $entity->getKey(); ?>');">Save</a>
</div>