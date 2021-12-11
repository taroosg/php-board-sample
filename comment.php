<?php

$dbn = 'mysql:dbname=gsacy_d01_00;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

$thread_id = $_GET['thread_id'];

$sql = 'SELECT * FROM thread_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $thread_id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$thread = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = 'SELECT * FROM comment_table WHERE thread_id = :thread_id ORDER BY created_at DESC';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':thread_id', $thread_id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$output = '';

foreach ($result as $record) {
  $output .= "<li><hr><p>{$record['created_at']} {$record['comment']}</p></li>";
}

?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $thread['name'] ?> スレッド</title>
</head>

<body>
  <h1><?= $thread['name'] ?> スレッド</h1>
  <a href="thread.php">スレ一覧に戻る</a>
  <form action="comment_create.php" method="POST">
    <fieldset>
      <legend>レス投稿</legend>
      <div>
        <input type="text" name="comment">
      </div>
      <div>
        <input type="hidden" name="thread_id" value="<?= $thread['id'] ?>">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>
  <fieldset>
    <legend>レス一覧</legend>
    <ul>
      <?= $output ?>
    </ul>
  </fieldset>
</body>

</html>