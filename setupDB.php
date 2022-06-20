<?php
$pdo = new PDO("sqlite:sample.sqlite3");
$query = "CREATE TABLE IF NOT EXISTS bbs (id INTEGER PRIMARY KEY, datetime TEXT, message TEXT)";
$pdo->exec($query);
$query = "DELETE FROM bbs";
$pdo->exec($query);

$messages = array(
    [date("Y/m/d(D) H:i:s"), "初めての投稿"],
);

$query = "INSERT INTO bbs (datetime, message) VALUES (?, ?)";
$stmt = $pdo->prepare($query);
foreach($messages as $message) {
    $stmt->execute($message);
}
?>
