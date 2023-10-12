<link href="<?php echo ROOT_URL; ?>/Engine/API/Maps/Collection/Style.css" rel="stylesheet" />
<a href="javascript:void(0)" class="butn" onclick="Tardis.Application.Plans.create();">Create</a>
<?php if($collection->count()): ?>
    <hr/>
    <table>
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php foreach($collection as $entity): ?>
            <tr>
                <td>
                    <?php echo $entity->getTitle(); ?>
                </td>
                <td>
                    <?php echo $entity->getStatusTitle(); ?>
                </td>
                <td>
                    <a href="javascript:void(0)" class="butn" onclick="Tardis.Application.Plans.show('<?php echo $entity->getKey(); ?>');">Show</a> &diams;
                    <a href="javascript:void(0)" class="butn" onclick="Tardis.Application.Plans.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>