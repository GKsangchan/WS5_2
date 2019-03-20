<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Maitree" rel="stylesheet">
    <style>
        input[type=text], select {
            width: auto;
            padding: 5px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-family:'maitree'
        }
        input[type=password], select {
            width: auto;
            padding: 5px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-family:'maitree'
        }
        input[type=number], select {
            width: auto;
            padding: 5px 20px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-family:'maitree'
        }
    </style>
    <title><?= $title ?></title>
</head>
<body>
<div id="container" style="width: 100%; margin:0%;padding: 0%; position:relative;font-family:'maitree';background-color:#FEFEFD;">
    <div id="header" style="width: 100%; margin:0%;padding: 0%; position:relative;">
        <?php include("header.inc.php"); //หาไม่เจอ จะหาที่โฟลเดอร์เดียวกัน ?>
    </div>
    <div id="content" style="text-align: center">
        <?= $content ?>
    </div>
    <div id="footer" style="left: 0; position:relative;Left: -20px;">
        <?php include("footer.inc.php"); ?>
    </div>
</div>
</body></html>
