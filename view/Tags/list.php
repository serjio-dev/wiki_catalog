<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<a href="/tag/create">Add new record</a><br>
<a href="/tag/upload_tag">Upload new record</a>
<table border="2">
    <tr>
        <th>
            Id
        </th>
        <th>
            Name
        </th>
        <th>
            Key
        </th>
        <th colspan="2">
            Actions
        </th>
    </tr>
    <?php foreach ($tags as $tag) { ?>
        <tr>
            <td>
                <?php echo $tag->getId()?>
            </td>
            <td>
                <?php echo $tag->getName()?>
            </td>
            <td>
                <?php echo $tag->getKey()?>
            </td>
            <td>
                <a href="/tag/edit?id=<?php echo $tag->getId()?>">Edit</a>
            </td>
            <td>
                <a href="/tag/remove?id=<?php echo $tag->getId()?>">Delete</a>
            </td>

        </tr>
    <?php } ?>
</table>
</body>
</html>
