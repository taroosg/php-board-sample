<?php
if (
  !isset($_POST['thread_name']) || $_POST['thread_name'] === ''
) {
  exit('ParamError...');
}

if ($_POST['password'] !== 'password') {
  exit('Invalid password...');
}

$name = $_POST['thread_name'];

$dbn = 'mysql:dbname=gsacy_d01_00;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

$sql = 'INSERT INTO thread_table (id, name, created_at, updated_at) VALUES (NULL, :name, now(), now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header('Location:thread.php');
exit();
