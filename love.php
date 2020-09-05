<?php
$res = "";
$USER= 'trainer';
$PW= 'redgreen';
$dnsinfo= "mysql:dbname=sampledb;host=localhost;charset=utf8";
$pdo = new PDO($dnsinfo,$USER,$PW);


echo '<a href="index.php">前に戻る</a>';



//更新処理
if(isset($_POST['submit'])){
  try{
    $sql = "UPDATE pokemon SET name=? ,love=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $array = array($_POST['name'],$_POST['love'],$_POST['id']);
    $stmt->execute($array);
  }catch(Exception $e){
    $res = $e->getMessage();
  }
}
//任意のレコードの更新ボタンがクリックされたときの処理
if(isset($_POST['update'])){
  try{
    $sql = "SELECT * FROM pokemon WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $array = array($_POST['TheId']);
    $stmt->execute($array);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $id = $row['id'];
    $name = $row['name'];
    $love = $row['love'];
  }catch(Exception $e){
    $res = $e->getMessage();
  }
}
//全レコードを更新ボタン付きで表示する処理
try{
  $sql = "SELECT * FROM pokemon";
  $stmt = $pdo->prepare($sql);
  $array = null;
  $stmt->execute($array);
  $res = "<table>\n";
  $res .= "<tr><td>" .'No.' ."</td><td>" .'名前'
        ."</td><td>" .'お気に入り度' ."</td><td>" .'更新' ."</td>";
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $res .= "<tr><td>" .$row['id'] ."</td><td>" .$row['name']
          ."</td><td>" .$row['love'] ."</td>";
    //更新ボタンのコード
    $res .= <<<eof
    <td><form method='post' action=''>
    <input type='hidden' name='TheId' value='{$row['id']}'>
    <input type='submit' name='update' value='更新したい'>
    </form></td>
eof;
    $res .= "</tr>\n";
  }
  $res .= "</table>\n";
}catch(Exception $e){
  $res = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>ポケモン図鑑</title>
<link rel="stylesheet" type="text/css" href="style.css" />

</head>
<body>
<h1>お気に入り度の更新</h1>

<?php
if(isset($_POST['update'])){
?>
<form action="" method="post">
<p>No.<?php echo $id;?></p>
<input type='hidden' name='id' size='10' value='<?php echo $id;?>' required>
<label>名前<input type='text' name='name' size='30' value='<?php echo $name;?>' readonly></label>
<label type='text' name='love' size='10' value='<?php echo $love;?>' required>お気に入り度<select name='love'>
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
</select></label>
<input type='submit' name='submit' value=' 更新する '>
<?php
}
?>
<?php echo $res;?>
</body>
</html>
