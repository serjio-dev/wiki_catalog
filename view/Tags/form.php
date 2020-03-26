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
            Name
        </th>
        <th>
            Key
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
                <input size="15" type="text" name="name" value="<?php echo !empty($tag) ? $tag->getName() : null; ?>">
            </td>
            <td>
                <input size="15" type="text" name="key" value="<?php echo !empty($tag) ? $tag->getKey() : null; ?>">
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