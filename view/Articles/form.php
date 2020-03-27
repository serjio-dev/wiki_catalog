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
                Id
            </th>
            <th>
                Title
            </th>
            <th>
                URL
            </th>
            <th>
                Content
            </th>
            <th>
                Action
            </th>
        </tr>
        <tr>
            <form action="<?php echo $rout; ?>" method="POST">
                <td>
                    <?php echo (!empty($article) ? $article->getId() : 'new'); ?>
                </td>
                <td>
                    <input size="10" type="text" name="title" value="<?php echo !empty($article) ? $article->getTitle() : null; ?>">
                </td>
                <td>
                    <input size="15" type="text" name="url" value="<?php echo !empty($article) ? $article->getUrl() : null; ?>">
                </td>
                <td>
                    <p><textarea rows="2" cols="25" name="content"><?php echo !empty($article) ? $article->getContent() : null; ?></textarea></p>
                </td>
                <td>
                    <input type="hidden" name="id" value="<?php echo !empty($article) ? $article->getId() : null; ?>">
                    <input type="submit" name="update" value="Save">
                </td>
            </form>
        </tr>
    </table>
</body>
</html>