<!DOCTYPE html>
<html lang="ja">
<head>
<title>ポケモンの詳細</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>


<?php
$db_user = "trainer";	//ユーザー名
$db_pass = "redgreen";	//パスワード
$db_host = "localhost";	//ホスト名
$db_name = "sampledb";	//データベース名
$db_type = "mysql";	//データベースの種類

$dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";

$pdo = new PDO($dsn,$db_user,$db_pass);

try {
  $pdo = new PDO($dsn, $db_user,$db_pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch(PDOException $Exception) {
  die('エラー :' . $Exception->getMessage());
}

$search_key = '%' . $_POST['search_key'] . '%';

try {

$sql= "SELECT * FROM pokemon WHERE name like :name LIMIT 1";//一個だけ表示する
    $stmh = $pdo->prepare($sql);
    $stmh->bindValue(':name',  $search_key, PDO::PARAM_STR );
    $stmh->execute();
    $count = $stmh->rowCount();
  } catch (PDOException $Exception) {
    print "エラー：" . $Exception->getMessage();
  }

if($count < 1){
	print "検索結果なし。<br>";
}else{
?>
<table border="1">
<tbody>
<tr><th>番号</th><th>名</th><th>分類</th><th>タイプ</th><th>特性</th><th>高さ(m)</th><th>重さ(kg)</th><th>生息地</th><th>説明</th><th>お気に入り度</th><th>お気に入り度更新</th></tr>
<?php
  while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
?>
<tr>
<td><?=htmlspecialchars($row['id'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['name'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['class'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['type'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['characteristic'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['height'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['weight'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['live'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['sentence'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['love'], ENT_QUOTES)?></td>
<td>
<form name="form1" method="post" action="love.php">
<br>
<input type="submit" name="search_key" value="お気に入り度変更">
</form>
</td>
</tr>

<?php
echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">前に戻る</a>';
?>

<?php
if(htmlspecialchars($row['id'], ENT_QUOTES) ==  1 ){ echo "<br><img src='ポケモン/フシギダネ.png'><br>フシギダネ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==  2 ){ echo "<br><img src='ポケモン/フシギソウ.png'><br>フシギソウ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==  3 ){ echo "<br><img src='ポケモン/フシギバナ.png'><br>フシギバナ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==  4 ){ echo "<br><img src='ポケモン/ヒトカゲ.png'><br>ヒトカゲ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==  5 ){ echo "<br><img src='ポケモン/リザード.png'><br>リザード";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==  6 ){ echo "<br><img src='ポケモン/リザードン.png'><br>リザードン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==  7 ){ echo "<br><img src='ポケモン/ゼニガメ.png'><br>ゼニガメ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==  8 ){ echo "<br><img src='ポケモン/カメール.png'><brカメール>";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==  9 ){ echo "<br><img src='ポケモン/カメックス.png'><br>カメックス";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 10 ){ echo "<br><img src='ポケモン/キャタピー.png'><br>キャタピー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 11 ){ echo "<br><img src='ポケモン/トランセル.png'><br>トランセル";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 12 ){ echo "<br><img src='ポケモン/バタフリー.png'><br>バタフリー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 13 ){ echo "<br><img src='ポケモン/ビードル.png'><br>ビードル";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 14 ){ echo "<br><img src='ポケモン/コクーン.png'><br>コクーン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 15 ){ echo "<br><img src='ポケモン/スピアー.png'><br>スピアー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 16 ){ echo "<br><img src='ポケモン/ポッポ.png'><br>ポッポ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 17 ){ echo "<br><img src='ポケモン/ピジョン.png'><br>ピジョン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 18 ){ echo "<br><img src='ポケモン/ピジョット.png'><br>ピジョット";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 19 ){ echo "<br><img src='ポケモン/コラッタ.png'><br>コラッタ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 20 ){ echo "<br><img src='ポケモン/ラッタ.png'><br>ラッタ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 21 ){ echo "<br><img src='ポケモン/オニスズメ.png'><br>オニスズメ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 22 ){ echo "<br><img src='ポケモン/オニドリル.png'><br>オニドリル";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 23 ){ echo "<br><img src='ポケモン/アーボ.png'><br>アーボ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 24 ){ echo "<br><img src='ポケモン/アーボック.png'><br>アーボック";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 25 ){ echo "<br><img src='ポケモン/ピカチュウ.png'><br>ピカチュウ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 26 ){ echo "<br><img src='ポケモン/ライチュウ.png'><br>ライチュウ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 27 ){ echo "<br><img src='ポケモン/サンド.png'><br>サンド";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 28 ){ echo "<br><img src='ポケモン/サンドパン.png'><br>サンドパン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 29 ){ echo "<br><img src='ポケモン/ニドラン♀.png'><br>ニドラン♀";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 30 ){ echo "<br><img src='ポケモン/ニドリーナ.png'><br>ニドリーナ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 31 ){ echo "<br><img src='ポケモン/ニドクイン.png'><br>ニドクイン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 32 ){ echo "<br><img src='ポケモン/ニドラン♂.png'><br>ニドラン♂";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 33 ){ echo "<br><img src='ポケモン/ニドリーノ.png'><br>ニドリーノ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 34 ){ echo "<br><img src='ポケモン/ニドキング.png'><br>ニドキング";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 35 ){ echo "<br><img src='ポケモン/ピッピ.png'><br>ピッピ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 36 ){ echo "<br><img src='ポケモン/ピクシー.png'><br>ピクシー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 37 ){ echo "<br><img src='ポケモン/ロコン.png'><br>ロコン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 38 ){ echo "<br><img src='ポケモン/キュウコン.png'><br>キュウコン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 39 ){ echo "<br><img src='ポケモン/プリン.png'><br>プリン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 40 ){ echo "<br><img src='ポケモン/プクリン.png'><br>プクリン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 41 ){ echo "<br><img src='ポケモン/ズバット.png'><br>ズバット";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 42 ){ echo "<br><img src='ポケモン/ゴルバット.png'><br>ゴルバット";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 43 ){ echo "<br><img src='ポケモン/ナゾノクサ.png'><br>ナゾノクサ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 44 ){ echo "<br><img src='ポケモン/クサイハナ.png'><br>クサイハナ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 45 ){ echo "<br><img src='ポケモン/ラフレシア.png'><br>ラフレシア";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 46 ){ echo "<br><img src='ポケモン/パラス.png'><br>パラス";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 47 ){ echo "<br><img src='ポケモン/パラセクト.png'><br>パラセクト";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 48 ){ echo "<br><img src='ポケモン/コンパン.png'><br>コンパン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 49 ){ echo "<br><img src='ポケモン/モルフォン.png'><br>モルフォン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 50 ){ echo "<br><img src='ポケモン/ディグダ.png'><br>ディグダ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 51 ){ echo "<br><img src='ポケモン/ダグトリオ.png'><br>ダグトリオ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 52 ){ echo "<br><img src='ポケモン/ニャース.png'><br>ニャース";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 53 ){ echo "<br><img src='ポケモン/ペルシアン.png'><br>ペルシアン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 54 ){ echo "<br><img src='ポケモン/コダック.png'><br>コダック";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 55 ){ echo "<br><img src='ポケモン/ゴルダック.png'><br>ゴルダック";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 56 ){ echo "<br><img src='ポケモン/マンキー.png'><br>マンキー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 57 ){ echo "<br><img src='ポケモン/オコリザル.png'><br>オコリザル";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 58 ){ echo "<br><img src='ポケモン/ガーディ.png'><br>ガーディ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 59 ){ echo "<br><img src='ポケモン/ウインディ.png'><br>ウインディ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 60 ){ echo "<br><img src='ポケモン/ニョロモ.png'><br>ニョロモ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 61 ){ echo "<br><img src='ポケモン/ニョロゾ.png'><br>ニョロゾ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 62 ){ echo "<br><img src='ポケモン/ニョロボン.png'><br>ニョロボン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 63 ){ echo "<br><img src='ポケモン/ケーシィ.png'><br>ケーシィ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 64 ){ echo "<br><img src='ポケモン/ユンゲラー.png'><br>ユンゲラー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 65 ){ echo "<br><img src='ポケモン/フーディン.png'><br>フーディン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 66 ){ echo "<br><img src='ポケモン/ワンリキー.png'><br>ワンリキー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 67 ){ echo "<br><img src='ポケモン/ゴーリキー.png'><br>ゴーリキー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 68 ){ echo "<br><img src='ポケモン/カイリキー.png'><br>カイリキー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 69 ){ echo "<br><img src='ポケモン/マダツボミ.png'><br>マダツボミ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 70 ){ echo "<br><img src='ポケモン/ウツドン.png'><br>ウツドン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 71 ){ echo "<br><img src='ポケモン/ウツボット.png'><br>ウツボット";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 72 ){ echo "<br><img src='ポケモン/メノクラゲ.png'><br>メノクラゲ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 73 ){ echo "<br><img src='ポケモン/ドククラゲ.png'><br>ドククラゲ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 74 ){ echo "<br><img src='ポケモン/イシツブテ.png'><br>イシツブテ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 75 ){ echo "<br><img src='ポケモン/ゴローン.png'><br>ゴローン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 76 ){ echo "<br><img src='ポケモン/ゴローニャ.png'><br>ゴローニャ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 77 ){ echo "<br><img src='ポケモン/ポニータ.png'><br>ポニータ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 78 ){ echo "<br><img src='ポケモン/ギャロップ.png'><br>ギャロップ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 79 ){ echo "<br><img src='ポケモン/ヤドン.png'><br>ヤドン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 80 ){ echo "<br><img src='ポケモン/ヤドラン.png'><br>ヤドラン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 81 ){ echo "<br><img src='ポケモン/コイル.png'><br>コイル";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 82 ){ echo "<br><img src='ポケモン/レアコイル.png'><br>レアコイル";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 83 ){ echo "<br><img src='ポケモン/カモネギ.png'><br>カモネギ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 84 ){ echo "<br><img src='ポケモン/ドードー.png'><br>ドードー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 85 ){ echo "<br><img src='ポケモン/ドードリオ.png'><br>ドードリオ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 86 ){ echo "<br><img src='ポケモン/パウワウ.png'><br>パウワウ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 87 ){ echo "<br><img src='ポケモン/ジュゴン.png'><br>ジュゴン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 88 ){ echo "<br><img src='ポケモン/ベトベター.png'><br>ベトベター";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 89 ){ echo "<br><img src='ポケモン/ベトベトン.png'><br>ベトベトン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 90 ){ echo "<br><img src='ポケモン/シェルダー.png'><br>シェルダー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 91 ){ echo "<br><img src='ポケモン/パルシェン.png'><br>パルシェン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 92 ){ echo "<br><img src='ポケモン/ゴース.png'><br>/ゴース";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 93 ){ echo "<br><img src='ポケモン/ゴースト.png'><br>ゴースト";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 94 ){ echo "<br><img src='ポケモン/ゲンガー.png'><br>ゲンガー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 95 ){ echo "<br><img src='ポケモン/イワーク.png'><br>イワーク";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 96 ){ echo "<br><img src='ポケモン/スリープ.png'><br>スリープ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 97 ){ echo "<br><img src='ポケモン/スリーパー.png'><br>スリーパー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 98 ){ echo "<br><img src='ポケモン/クラブ.png'><br>クラブ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) == 99 ){ echo "<br><img src='ポケモン/キングラー.png'><br>キングラー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==100 ){ echo "<br><img src='ポケモン/ビリリダマ.png'><br>ビリリダマ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==101 ){ echo "<br><img src='ポケモン/マルマイン.png'><br>マルマイン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==102 ){ echo "<br><img src='ポケモン/タマタマ.png'><br>タマタマ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==103 ){ echo "<br><img src='ポケモン/ナッシー.png'><br>ナッシー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==104 ){ echo "<br><img src='ポケモン/カラカラ.png'><br>カラカラ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==105 ){ echo "<br><img src='ポケモン/ガラガラ.png'><br>ガラガラ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==106 ){ echo "<br><img src='ポケモン/サワムラー.png'><br>サワムラー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==107 ){ echo "<br><img src='ポケモン/エビワラー.png'><br>エビワラー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==108 ){ echo "<br><img src='ポケモン/ベロリンガ.png'><br>ベロリンガ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==109 ){ echo "<br><img src='ポケモン/ドガース.png'><br>ドガース";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==110 ){ echo "<br><img src='ポケモン/マタドガス.png'><br>マタドガス";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==111 ){ echo "<br><img src='ポケモン/サイホーン.png'><br>サイホーン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==112 ){ echo "<br><img src='ポケモン/サイドン.png'><br>サイドン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==113 ){ echo "<br><img src='ポケモン/ラッキー.png'><br>ラッキー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==114 ){ echo "<br><img src='ポケモン/モンジャラ.png'><br>モンジャラ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==115 ){ echo "<br><img src='ポケモン/ガルーラ.png'><br>ガルーラ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==116 ){ echo "<br><img src='ポケモン/タッツー.png'><br>タッツー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==117 ){ echo "<br><img src='ポケモン/シードラ.png'><br>シードラ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==118 ){ echo "<br><img src='ポケモン/トサキント.png'><br>トサキント";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==119 ){ echo "<br><img src='ポケモン/アズマオウ.png'><br>アズマオウ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==120 ){ echo "<br><img src='ポケモン/ヒトデマン.png'><br>ヒトデマン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==121 ){ echo "<br><img src='ポケモン/スターミー.png'><br>スターミー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==122 ){ echo "<br><img src='ポケモン/バリヤード.png'><br>バリヤード";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==123 ){ echo "<br><img src='ポケモン/ストライク.png'><br>ストライク";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==124 ){ echo "<br><img src='ポケモン/ルージュラ.png'><br>ルージュラ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==125 ){ echo "<br><img src='ポケモン/エレブー.png'><br>エレブー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==126 ){ echo "<br><img src='ポケモン/ブーバー.png'><br>/ブーバー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==127 ){ echo "<br><img src='ポケモン/カイロス.png'><br>カイロス";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==128 ){ echo "<br><img src='ポケモン/ケンタロス.png'><br>ケンタロス";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==129 ){ echo "<br><img src='ポケモン/コイキング.png'><br>コイキング";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==130 ){ echo "<br><img src='ポケモン/ギャラドス.png'><br>ギャラドス";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==131 ){ echo "<br><img src='ポケモン/ラプラス.png'><br>ラプラス";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==132 ){ echo "<br><img src='ポケモン/メタモン.png'><br>メタモン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==133 ){ echo "<br><img src='ポケモン/イーブイ.png'><br>イーブイ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==134 ){ echo "<br><img src='ポケモン/シャワーズ.png'><br>シャワーズ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==135 ){ echo "<br><img src='ポケモン/サンダース.png'><br>サンダース";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==136 ){ echo "<br><img src='ポケモン/ブースター.png'><br>ブースター";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==137 ){ echo "<br><img src='ポケモン/ポリゴン.png'><br>ポリゴン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==138 ){ echo "<br><img src='ポケモン/オムナイト.png'><br>オムナイト";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==139 ){ echo "<br><img src='ポケモン/オムスター.png'><br>オムスター";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==140 ){ echo "<br><img src='ポケモン/カブト.png'><br>カブト";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==141 ){ echo "<br><img src='ポケモン/カブトプス.png'><br>カブトプス";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==142 ){ echo "<br><img src='ポケモン/プテラ.png'><br>プテラ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==143 ){ echo "<br><img src='ポケモン/カビゴン.png'><br>カビゴン";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==144 ){ echo "<br><img src='ポケモン/フリーザー.png'><br>フリーザー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==145 ){ echo "<br><img src='ポケモン/サンダー.png'><br>サンダー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==146 ){ echo "<br><img src='ポケモン/ファイヤー.png'><br>ファイヤー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==147 ){ echo "<br><img src='ポケモン/ミニリュウ.png'><br>ミニリュウ";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==148 ){ echo "<br><img src='ポケモン/ハクリュー.png'><br>ハクリュー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==149 ){ echo "<br><img src='ポケモン/カイリュー.png'><br>カイリュー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==150 ){ echo "<br><img src='ポケモン/ミュウツー.png'><br>ミュウツー";}
if(htmlspecialchars($row['id'], ENT_QUOTES) ==151 ){ echo "<br><img src='ポケモン/ミュウ.png'><br>ミュウ";}
?>

<?php
}
?>
</tbody></table>

<?php
}

?>
<!--
<?php
if(isset($_POST['update'])){
?>
<form action="" method="post">
<p>id:<?php echo $id;?></p>
<input type='hidden' name='id' size='10' value='<?php echo $id;?>' required>
<label>name<input type='text' name='name' size='30' value='<?php echo $name;?>' required></label>
<label>love<input type='text' name='love' size='10' value='<?php echo $love;?>' required></label>
<input type='submit' name='submit' value=' 更新 '>
<?php
}
?>
<?php echo $res;?>
 -->



</body>
</html>
