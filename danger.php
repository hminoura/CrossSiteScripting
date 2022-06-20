<?php
$pdo = new PDO("sqlite:sample.sqlite3");

fputs(STDERR, "メッセージ: ");
$msg = trim(fgets(STDIN));

if ($msg) {
    $query = "INSERT INTO bbs (datetime, message) VALUES (?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array(date("Y/m/d(D) H:i:s"), $msg));
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <style type="text/css">td {border: solid green 1px;}</style>
  </head>
  <body>
    <h1 id="title">掲示板</h1>
    <a id="top" href="https://www.suzuka-ct.ac.jp">鈴鹿高専HP</a>
    <table>
<?php
$pdo = new PDO("sqlite:sample.sqlite3");

$query = "SELECT * FROM bbs ORDER BY id";
$stmt = $pdo->prepare($query);
$stmt->execute();

while ($result = $stmt->fetch(PDO::FETCH_ASSOC))
    print("      <tr><td>" . $result["datetime"] . "</td><td>" . $result["message"] . "</td></tr>\n");
?>
    </table>
  </body>
</html>
        
