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

$sql = 'SELECT * FROM thread_table ORDER BY updated_at DESC';
$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$output = '';

foreach ($result as $record) {
  $output .= "<li><a href=\"comment.php?thread_id={$record['id']}\">{$record['name']}</a></li>";
}

?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>どこかで見た掲示板風なやつ</title>
</head>

<body>
  <h1>どこかで見た掲示板風なやつ</h1>
  <form action="thread_create.php" method="POST">
    <fieldset>
      <legend>スレ建て</legend>
      <div>
        スレッド名：<input type="text" name="thread_name">
      </div>
      <div>
        パスワード：<input type="text" name="password">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>
  <fieldset>
    <legend>スレ一覧</legend>
    <ul>
      <?= $output ?>
    </ul>
  </fieldset>
</body>

</html>