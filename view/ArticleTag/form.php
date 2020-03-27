<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table border="2">
    <tr>
        <th>
            Tag Name
        </th>
        <th>
            Article Title
        </th>
        <th>
            Action
        </th>
    </tr>
    <tr>
        <form action="<?php echo $rout; ?>" method="POST">
            <td>
                <?php echo (!empty($tag) ? $tag->getId() : 'new'); ?>
            </td>
            <td>
                <select name="article_id">
                    <?php foreach ($articles as $article) {?>
                        <option value="<?php echo $article->getId()?>"><?php echo $article->getTitle()?></option>
                    <?php }?>
                </select>
            </td>
            <td>
                <select name="tag_id">
                    <?php foreach ($tags as $tag) {?>
                        <option value="<?php echo $tag->getId()?>"><?php echo $tag->getName()?></option>
                    <?php }?>
                </select>
            </td>
            <td>
                <input type="hidden" name="id" value="<?php echo !empty($tag) ? $tag->getId() : null; ?>">
                <input type="submit" name="update" value="Save">
            </td>
        </form>
    </tr>
</table>
</body>
</html>