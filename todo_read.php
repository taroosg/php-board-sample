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

$i = function ($x) {
  return $x;
};

if ($_GET['order'] === 'deadline') {
  $sql = "SELECT * FROM todo_table ORDER BY deadline {$i($_GET['param'] == 0 ? 'ASC' : 'DESC')}";
} else if ($_GET['order'] === 'todo') {
  $sql = "SELECT * FROM todo_table ORDER BY todo {$i($_GET['param'] == 0 ? 'ASC' : 'DESC')}";
} else {
  $sql = 'SELECT * FROM todo_table';
}

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
  $output .= "<tr><td>{$record['deadline']}</td><td>{$record['todo']}</td><tr>";
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>DB連携型todoリスト（一覧画面）</legend>
    <a href="todo_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th><a href="todo_read.php?order=deadline&param=<?= $_GET['param'] == 0 ? 1 : 0 ?>">deadline</a></th>
          <th><a href="todo_read.php?order=todo&param=<?= $_GET['param'] == 0 ? 1 : 0 ?>">todo</a></th>
        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>