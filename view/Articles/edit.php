<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    Title: <?php echo $article->getTitle(); ?>
    Url: <?php echo $article->getUrl(); ?>

    <h1><?php echo $title;?></h1>

<?php \Wiki\Catalog\Data\Connector::getPdo() ?>
</body>
</html>