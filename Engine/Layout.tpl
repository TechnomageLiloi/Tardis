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

        <script src="<?php echo ROOT_URL; ?>/Engine/API/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Degrees/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Lessons/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Problems/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Tickets/Requests.js"></script>

        <script src="<?php echo ROOT_URL; ?>/Engine/Bootstrap.js"></script>

        <title>TARDIS</title>
    </head>
    <body>
        <div id="head" style="font-size: x-large;">
            <a href="javascript:void(0)" class="butn" onclick="TARDIS.Degrees.getCollection();">Degrees</a>
            <a href="javascript:void(0)" class="butn" onclick="TARDIS.Lessons.schedule('<?php echo gmdate('Y-m-d'); ?>');">Schedule</a>
            <a href="javascript:void(0)" class="butn" onclick="TARDIS.Lessons.timetable();">Timetable</a>
        </div>
        <div id="page">
            <script>
                TARDIS.Lessons.timetable();
            </script>
        </div>
    </body>
</html>