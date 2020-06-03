<?php

$title = $_POST['title'];

$content = $_POST['content'];

$user_name = $_POST['user_name'];

if (empty($title) || empty($content) || empty($user_name))
{
    exit('标题或者内容或者用户名不能为空');
}

try {

    $dsn = 'mysql:dbname=test;host=localhost';
    $username = 'test';
    $password = 'test';
    $attr = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
    $pdo = new PDO($dsn, $username, $password, $attr);
    $sql = 'insert into message(title, content, created_at, user_name)
        values(:title, :content, :created_at, :user_name)';
    $stmt = $pdo->prepare($sql);
    $data = [
        ':title' => $title,
        ':content' => $content,
        ':created_at' => time(),
        ':user_name' => $user_name
    ];
    $stmt->execute($data);
    $rows = $stmt->rowCount();

    if($rows)
    {
        exit('添加成功');
    } else {
        exit('添加失败');
    }

} catch(PDOException $e) {
    // 异常
    echo $e->getMessge();
}






