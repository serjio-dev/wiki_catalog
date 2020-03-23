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
            <th colspan="2">
                Actions
            </th>
        </tr>
        <? foreach ($articles as $article){?>
            <tr>
                <td>
                    <?=$article->getId()?>
                </td>
                <td>
                    <?=$article->getTitle()?>
                </td>
                <td>
                    <?=$article->getUrl()?>
                </td>
                <td>
                    <?=$article->getContent()?>
                </td>
                <td>
                    <a href="edit?id=<?=$article->getId()?>">Edit</a>
                </td>
                <td>
                    <a href="remove?id=<?=$article->getId()?>">Delete</a>
                </td>
    
            </tr>
        <?}?>
    </table>
</body>
</html>
