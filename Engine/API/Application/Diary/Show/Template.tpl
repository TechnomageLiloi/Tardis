<link href="<?php echo ROOT_URL; ?>/Engine/API/Application/Diary/Show/Style.css" rel="stylesheet" />

<div id="application-diary-show" class="stylo">

    <div class="controls">
        <a href="javascript:void(0)" onclick="Interstate60.Application.Diary.show();">Show</a> at
        <input type="date" name="key_day" value="<?php echo $entity->getKey(); ?>">
        <a href="javascript:void(0)" onclick="Interstate60.Application.Diary.edit();">Edit</a>
    </div>

    <hr/>

    <h1 class="wrap-title">
        <?php echo $entity->getTitle(); ?>
    </h1>

    <div class="data">
        <?php echo $entity->getData(); ?><br/>
        <strong>Mark: <?php echo $listTickets->getMark(); ?></strong> &diam;
        <strong>Efficiency: <?php echo $listTickets->getEfficiency(); ?></strong>
    </div>

    <?php echo $entity->parse(); ?>

    <div class="wrap-tickets">
        <?php foreach($listTickets as $ticket): ?>
        <?php echo $ticket->parse(); ?>
        <div class="ticket">
            <?php $link = $ticket->getLink(); ?>
            <?php if($link): ?>
                <a href="<?php echo $link; ?>" target="_blank">
                    <?php echo $ticket->getTitle(); ?>
                </a>
            <?php else: ?>
                <?php echo $ticket->getTitle(); ?>
            <?php endif; ?> &diam;
            <?php echo $ticket->getStatusTitle(); ?> &diam;
            <?php echo $ticket->getStart(); ?> &diam;
            <a href="javascript:void(0);" onclick="navigator.clipboard.writeText('<?php echo $ticket->getTitle(); ?>');alert('Copied');">Copy</a> &diam;
            <a href="javascript:void(0)" onclick="Interstate60.Application.Tickets.edit('<?php echo $ticket->getKey(); ?>');">Edit</a>
        </div>
        <?php endforeach; ?>
    </div>
</div>