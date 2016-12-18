<!DOCTYPE html>
<html>
<head>
    <title>ひとこと掲示板</title>
</head>
<body>
    <h1>ひとこと掲示板</h1>

    <from action="bbs.php" method="post">
        名前: <input type="text" name="name" />
        <br/>
        ひとこと: <input type="text" name="comment" size="60" />
        <br />
        <input type="submit" value="送信" />
    </from>
</body>
</html>