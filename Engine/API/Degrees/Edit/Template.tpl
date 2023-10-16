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
    <a href="javascript:void(0)" onclick="Tardis.Degrees.getCollection();">&blacktriangleleft; Back</a> &diams;
    <a href="javascript:void(0)" onclick="Tardis.Degrees.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <hr/>
    <table style="width: 100%;">
        <tr>
            <th>Name</th>
            <th>Value</th>
        </tr>
        <tr><td>Title</td><td><input type="text" name="title" value="<?php echo $entity->getTitle(); ?>"/></td></tr>
        <tr><td>UID</td><td><input type="text" name="uid" value="<?php echo $entity->getUid(); ?>"/></td></tr>
        <tr><td>Program</td><td><textarea name="program"><?php echo $entity->getProgram(); ?></textarea></td></tr>
        <tr><td>Status</td><td>
            <select name="status">
                <?php foreach($statuses as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if($entity->getStatus() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Tardis.Degrees.getCollection();">&blacktriangleleft; Back</a> &diams;
    <a href="javascript:void(0)" onclick="Tardis.Degrees.save('<?php echo $entity->getKey(); ?>');">Save</a>
</div>