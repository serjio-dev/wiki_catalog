<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<a href="/article_tag/create">Add new record</a><br>
<table border="2">
    <tr>
        <th>
            Tag Name
        </th>
        <th>
            Article Title
        </th>
        <th colspan="2">
            Actions
        </th>
    </tr>
    <?php foreach ($articles_tags as $article_tag) { ?>
        <tr>
            <td>
                <?php echo $article_tag->getTagName()?>
            </td>
            <td>
                <?php echo $article_tag->getArticleTitle()?>
            </td>
            <td>
                <a href="/article_tag/edit?id=<?php echo $article_tag->getId()?>">Edit</a>
            </td>
            <td>
                <a href="/article_tag/remove?id=<?php echo $article_tag->getId()?>">Delete</a>
            </td>

        </tr>
    <?php } ?>
</table>
</body>
</html>
