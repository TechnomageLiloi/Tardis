<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Tests</title>

  <link rel="shortcut icon" type="image/png" href="/Libraries/Jasmine/jasmine_favicon.png">
  <link rel="stylesheet" href="/Libraries/Jasmine/jasmine.css">

  <script src="/Libraries/Jasmine/jasmine.js"></script>
  <script src="/Libraries/Jasmine/jasmine-html.js"></script>
  <script src="/Libraries/Jasmine/boot0.js"></script>
  <script src="/Libraries/Jasmine/boot1.js"></script>

  <!-- include spec files here... -->
  <script src="/Tests/CheckTest.js"></script>

</head>

<div style="background-color: black; color: white;padding: 5px;margin: 0px;">
    <?php echo str_replace("\n", "<br/>", shell_exec('phpunit')); ?>
</div>

<hr/>

<body>
</body>
</html>
