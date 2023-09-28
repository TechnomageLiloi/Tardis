<link href="<?php echo ROOT_URL; ?>/Engine/API/Maps/Collection/Style.css" rel="stylesheet" />
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
                    <?php echo $entity->getStatusCaption(); ?>
                </td>
                <td>
                    <a href="javascript:void(0)" class="butn" onclick="Interstate60.Application.Maps.show('<?php echo $entity->getKey(); ?>');">Show</a> &diams;
                    <a href="javascript:void(0)" class="butn" onclick="Interstate60.Application.Maps.edit('<?php echo $entity->getKey(); ?>');">Edit</a> &diams;
                    <a href="javascript:void(0)" class="butn" onclick="Interstate60.Application.Maps.remove('<?php echo $entity->getKey(); ?>');">Remove</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>