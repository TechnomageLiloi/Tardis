<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="shortcut icon" type="image/png" href="/Signum.png">

        <!-- @todo: add function to link scripts and styles -->
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-framework/Frontside/Library/Jquery.min.js"></script>
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-framework/Frontside/Library/Underscore.min.js"></script>
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-framework/Frontside/Library/Backbone.min.js"></script>
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-api/Client/API.js"></script>
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/stylo/Source/Stylo.js"></script>

        <link href="<?php echo ROOT_URL; ?>/Engine/Style.css" rel="stylesheet" />
        <link href="<?php echo ROOT_URL; ?>/Engine/API/Style.css" rel="stylesheet" />

        <script src="<?php echo ROOT_URL; ?>/Engine/Bootstrap.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Quests/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Plan/Requests.js"></script>

        <title>Artifacts / <?php echo date('Y-m-d H:i:s'); ?></title>
    </head>
    <body>
        <div id="head">
            <a href="javascript:void(0)" class="butn" onclick="location.reload();">Reload</a>
            <a href="javascript:void(0)" onclick="I60.Plan.show('<?php echo date('Y-m-d'); ?>');" class="butn">Plan</a>
            <a href="javascript:void(0)" onclick="TARDIS.Quests.collection();" class="butn">Quests</a>
            <a href="javascript:void(0)" onclick="TARDIS.Quests.schedule();" class="butn">Schedule</a>
        </div>
        <div id="page">
            <script>
                //TARDIS.Quests.collection();
                I60.Plan.show('<?php echo date('Y-m-d'); ?>');
            </script>
        </div>
    </body>
</html>