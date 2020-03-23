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
            <form action="update" method="GET">
                <td>
                    <?=$article->getID()?>
                </td>
                <td>
                    <input size="10" type="text" name="title" value="<?=$article->getTitle()?>">
                </td>
                <td>
                    <input size="15" type="text" name="url" value="<?=$article->getUrl()?>">
                </td>
                <td>
                    <p><textarea rows="2" cols="25" name="content"><?=$article->getContent()?></textarea></p>
                </td>
                <td>
                    <input type="hidden" name="id" value="<?=$article->getID() ?>">
                    <input type="submit" name="update" value="Save">
                </td>
            </form>
        </tr>
    </table>

</body>
</html>