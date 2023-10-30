<link href="<?php echo ROOT_URL; ?>/Engine/API/Application/Diary/Show/Style.css" rel="stylesheet" />

<div id="application-diary-show" class="stylo">

    <div class="controls">
        <a href="javascript:void(0)" onclick="Tardis.Application.Diary.show();">Show</a> &diams;
        <a href="javascript:void(0)" onclick="Tardis.Application.Diary.edit();">Edit</a>
    </div>

    <div class="data">
        <?php echo $entity->getID(); ?><br/>
        <?php echo $entity->getPeriod(); ?> Quarters &diams;
        <?php echo $entity->getStatusTitle(); ?> &diams;
        <?php echo $entity->getTypeTitle(); ?> &diams;
        <?php echo $entity->getData(); ?><br/>
    </div>

    <hr/>

    <table>
        <tr>
            <td style="width: 10%;">
                <?php if(file_exists(ROOT_DIR . '/Images/Real.jpg')): ?>
                    <img src="<?php echo ROOT_URL; ?>/Images/Real.jpg" width="170">
                <?php else: ?>
                    <img src="<?php echo ROOT_URL; ?>/Images/Teacher.gif"> <!-- Thanks in README.md -->
                <?php endif; ?>
            </td>
            <td>
                <?php echo $lesson->getComment(); ?>
            </td>
        </tr>
    </table>

    <hr/>

    <h1 class="wrap-title">
        <?php echo $entity->getTitle(); ?>
    </h1>

    <?php echo $entity->parse(); ?>
</div>