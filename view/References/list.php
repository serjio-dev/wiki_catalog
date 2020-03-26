<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<a href="/reference/create">Add new record</a><br>
<a href="/reference/upload_reference">Upload new record</a>
<table border="2">
    <tr>
        <th>
            Id
        </th>
        <th>
            Article ID
        </th>
        <th>
            Link
        </th>
        <th>
            Content
        </th>
        <th colspan="2">
            Actions
        </th>
    </tr>
    <?php foreach ($references as $reference) { ?>
        <tr>
            <td>
                <?php echo $reference->getId()?>
            </td>
            <td>
                <?php echo $reference->getArticleTitle()?>
            </td>
            <td>
                <?php echo $reference->getLink()?>
            </td>
            <td>
                <?php echo $reference->getContent()?>
            </td>
            <td>
                <a href="/reference/edit?id=<?php echo $reference->getId()?>">Edit</a>
            </td>
            <td>
                <a href="/reference/remove?id=<?php echo $reference->getId()?>">Delete</a>
            </td>

        </tr>
    <?php } ?>
</table>
</body>
</html>
