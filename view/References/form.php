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
            Article Title
        </th>
        <th>
            Link
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
                <?php echo (!empty($reference) ? $reference->getId() : 'new'); ?>
            </td>
            <td>
                <select name="article_id">
                    <?php foreach ($articles as $id => $value) { ?>
                        <option value=<?=$id?> <?php echo !empty($reference) && $reference->getArticleId() == $id ? "selected" : ""?>><?=$value?></option>
                    <?php } ?>
                </select>
            </td>
            <td>
                <input size="15" type="text" name="link" value="<?php echo !empty($reference) ? $reference->getLink() : null; ?>">
            </td>
            <td>
                <p><textarea rows="2" cols="25" name="content"><?php echo !empty($reference) ? $reference->getContent() : null; ?></textarea></p>
            </td>
            <td>
                <input type="hidden" name="id" value="<?php echo !empty($reference) ? $reference->getId() : null; ?>">
                <input type="submit" name="update" value="Save">
            </td>
        </form>
    </tr>
</table>
</body>
</html>