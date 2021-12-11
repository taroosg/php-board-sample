<?php

if (
  !isset($_POST['comment']) || $_POST['comment'] === ''
) {
  exit('ParamError...');
}

$thread_id = $_POST['thread_id'];
$comment = $_POST['comment'];

$dbn = 'mysql:dbname=gsacy_d01_00;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// SQL作成&実行
$sql = 'INSERT INTO comment_table (id, thread_id, comment, created_at, updated_at) VALUES (NULL, :thread_id, :comment, now(), now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':thread_id', $thread_id, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$sql = 'UPDATE thread_table SET updated_at=now() WHERE id=:thread_id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':thread_id', $thread_id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}


header("Location:comment.php?thread_id={$thread_id}");
exit();
