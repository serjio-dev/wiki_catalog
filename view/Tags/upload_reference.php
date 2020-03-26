<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<a href="/tag/list">To back</a>

<form action="/reference/upload_tag" method="post">
    <select name="article_id">
        <?php foreach ($articles as $id => $value) { ?>
            <option value=<?=$id?>><?=$value?></option>
        <?php } ?>
    </select>
    <input type="submit" title="Upload Reference"/>
</form>
</body>