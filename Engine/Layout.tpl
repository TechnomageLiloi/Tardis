<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- @todo: add function to link scripts and styles -->
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-framework/Frontside/Library/Jquery.min.js"></script>
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-framework/Frontside/Library/Underscore.min.js"></script>
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-framework/Frontside/Library/Backbone.min.js"></script>
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-api/Client/API.js"></script>

        <link href="<?php echo ROOT_URL; ?>/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="<?php echo ROOT_URL; ?>/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/stylo/Source/Stylo.js"></script>
        <link href="<?php echo ROOT_URL; ?>/Engine/Style.css" rel="stylesheet" />

        <script src="<?php echo ROOT_URL; ?>/Engine/API/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Application/Requests.js"></script>

        <title>Interstate 60</title>
    </head>
    <body>
        <table id="interface">
            <tr>
                <td class="menu top">
                    <a href="javascript:void(0)" class="butn" onclick="Interstate60.Application.Diary.create();">Jump to new day</a>
                </td>
            </tr>
            <tr>
                <td>
                    <div id="page">

                    </div>
                </td>
            </tr>
            <tr>
            </tr>
        </table>
        <script>
            Interstate60.Application.Diary.show();
        </script>
    </body>
</html>