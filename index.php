<?php

//①データ取得ロジックを呼び出す
include_once('model.php');

$userData = getUserData($_GET);

?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ポケモンの検索機能</title>
<link rel="stylesheet" href="style.css">

<!-- Bootstrap読み込み（スタイリングのため） -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
</head>
<body>
<h1 class="col-xs-6 col-xs-offset-3">検索フォーム</h1>
<div class="col-xs-6 col-xs-offset-3 well">
	<form name="form1" method="post" action="love.php">
	<br>
	<input type="submit" value="お気に入り度変更">
	</form>

	<?php //②検索フォーム ?>
	<form method="get">
		<div class="form-group">
			<label for="InputName">名前</label>
			<input name="name" class="form-control" id="InputName" value="<?php echo isset($_GET['name']) ? htmlspecialchars($_GET['name']) : '' ?>">
		</div>
		<div class="form-group">
			<label for="InputAge">タイプ</label>
			<select name="type"  class="form-control" id="InputAge">
			<option value="0" <?php echo empty($_GET['type']) ? 'selected' : '' ?>>選択しない</option>
			<option value="ノーマル" <?php echo isset($_GET['type']) && $_GET['type'] == 'ノーマル' ? 'selected' : '' ?>>ノーマル</option>
			<option value="ほのお" <?php echo isset($_GET['type']) && $_GET['type'] == 'ほのお' ? 'selected' : '' ?>>ほのお</option>
			<option value="みず" <?php echo isset($_GET['type']) && $_GET['type'] == 'みず' ? 'selected' : '' ?>>みず</option>
			<option value="くさ" <?php echo isset($_GET['type']) && $_GET['type'] == 'くさ' ? 'selected' : '' ?>>くさ</option>
			<option value="でんき" <?php echo isset($_GET['type']) && $_GET['type'] == 'でんき' ? 'selected' : '' ?>>でんき</option>
			<option value="こおり" <?php echo isset($_GET['type']) && $_GET['type'] == 'こおり' ? 'selected' : '' ?>>こおり</option>
			<option value="かくとう" <?php echo isset($_GET['type']) && $_GET['type'] == 'かくとう' ? 'selected' : '' ?>>かくとう</option>
			<option value="どく" <?php echo isset($_GET['type']) && $_GET['type'] == 'どく' ? 'selected' : '' ?>>どく</option>
			<option value="じめん" <?php echo isset($_GET['type']) && $_GET['type'] == 'じめん' ? 'selected' : '' ?>>じめん</option>
			<option value="ひこう" <?php echo isset($_GET['type']) && $_GET['type'] == 'ひこう' ? 'selected' : '' ?>>ひこう</option>
			<option value="エスパー" <?php echo isset($_GET['type']) && $_GET['type'] == 'エスパー' ? 'selected' : '' ?>>エスパー</option>
			<option value="むし" <?php echo isset($_GET['type']) && $_GET['type'] == 'むし' ? 'selected' : '' ?>>むし</option>
			<option value="いわ" <?php echo isset($_GET['type']) && $_GET['type'] == 'いわ' ? 'selected' : '' ?>>いわ</option>
			<option value="ゴースト" <?php echo isset($_GET['type']) && $_GET['type'] == 'ゴースト' ? 'selected' : '' ?>>ゴースト</option>
			<option value="ドラゴン" <?php echo isset($_GET['type']) && $_GET['type'] == 'ドラゴン' ? 'selected' : '' ?>>ドラゴン</option>
			<option value="あく" <?php echo isset($_GET['type']) && $_GET['type'] == 'あく' ? 'selected' : '' ?>>あく</option>
			<option value="はがね" <?php echo isset($_GET['type']) && $_GET['type'] == 'はがね' ? 'selected' : '' ?>>はがね</option>
			<option value="フェアリー" <?php echo isset($_GET['type']) && $_GET['type'] == 'フェアリー' ? 'selected' : '' ?>>フェアリー</option>
		</select>


		</div>
		<div class="form-group">
			<label for="InputAge">特性</label>
			<select name="characteristic" class="form-control" id="InputAge">
				<option value="0" <?php echo empty($_GET['characteristic']) ? 'selected' : '' ?>>選択しない</option>
				<option value="あくしゅう" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'あくしゅう' ? 'selected' : '' ?>>あくしゅう</option>
				<option value="あついしぼう" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'あついしぼう' ? 'selected' : '' ?>>あついしぼう</option>
				<option value="ありじごく" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'ありじごく' ? 'selected' : '' ?>>ありじごく</option>
				<option value="いかく" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'いかく' ? 'selected' : '' ?>>いかく</option>
				<option value="いかりのつぼ" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'いかりのつぼ' ? 'selected' : '' ?>>いかりのつぼ</option>
				<option value="いしあたま" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'いしあたま' ? 'selected' : '' ?>>いしあたま</option>
				<option value="いろめがね" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'いろめがね' ? 'selected' : '' ?>>いろめがね</option>
				<option value="うるおいボディ" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'うるおいボディ' ? 'selected' : '' ?>>うるおいボディ</option>
				<option value="かいりきバサミ" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'かいりきバサミ' ? 'selected' : '' ?>>かいりきバサミ</option>
				<option value="かがくへんかガス" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'かがくへんかガス' ? 'selected' : '' ?>>かがくへんかガス</option>
				<option value="かたやぶり" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'かたやぶり' ? 'selected' : '' ?>>かたやぶり</option>
				<option value="かちき" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'かちき' ? 'selected' : '' ?>>かちき</option>
				<option value="かんそうはだ" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'かんそうはだ' ? 'selected' : '' ?>>かんそうはだ</option>
				<option value="がんじょう" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'がんじょう' ? 'selected' : '' ?>>がんじょう</option>
				<option value="きもったま" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'きもったま' ? 'selected' : '' ?>>きもったま</option>
				<option value="げきりゅう" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'げきりゅう' ? 'selected' : '' ?>>げきりゅう</option>
				<option value="こんじょう" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'こんじょう' ? 'selected' : '' ?>>こんじょう</option>
				<option value="しぜんかいふく" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'しぜんかいふく' ? 'selected' : '' ?>>しぜんかいふく</option>
				<option value="しめりけ" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'しめりけ' ? 'selected' : '' ?>>しめりけ</option>
				<option value="しんりょく" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'しんりょく' ? 'selected' : '' ?>>しんりょく</option>
				<option value="じゅうなん" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'じゅうなん' ? 'selected' : '' ?>>じゅうなん</option>
				<option value="じりょく" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'じりょく' ? 'selected' : '' ?>>じりょく</option>
				<option value="すいすい" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'すいすい' ? 'selected' : '' ?>>すいすい</option>
				<option value="すてみ" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'すてみ' ? 'selected' : '' ?>>すてみ</option>
				<option value="すながくれ" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'すながくれ' ? 'selected' : '' ?>>すながくれ</option>
				<option value="するどいめ" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'するどいめ' ? 'selected' : '' ?>>するどいめ</option>
				<option value="せいしんりょく" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'せいしんりょく' ? 'selected' : '' ?>>せいしんりょく</option>
				<option value="せいでんき" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'せいでんき' ? 'selected' : '' ?>>せいでんき</option>
				<option value="だっぴ" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'だっぴ' ? 'selected' : '' ?>>だっぴ</option>
				<option value="ちくでん" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'ちくでん' ? 'selected' : '' ?>>ちくでん</option>
				<option value="ちどりあし" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'ちどりあし' ? 'selected' : '' ?>>ちどりあし</option>
				<option value="ちょすい" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'ちょすい' ? 'selected' : '' ?>>ちょすい</option>
				<option value="てきおうりょく" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'てきおうりょく' ? 'selected' : '' ?>>てきおうりょく</option>
				<option value="てつのこぶし" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'てつのこぶし' ? 'selected' : '' ?>>てつのこぶし</option>
				<option value="てんのめぐみ" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'てんのめぐみ' ? 'selected' : '' ?>>てんのめぐみ</option>
				<option value="とうそうしん" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'とうそうしん' ? 'selected' : '' ?>>とうそうしん</option>
				<option value="どくのトゲ" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'どくのトゲ' ? 'selected' : '' ?>>どくのトゲ</option>
				<option value="どんかん" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'どんかん' ? 'selected' : '' ?>>どんかん</option>
				<option value="にげあし" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'にげあし' ? 'selected' : '' ?>>にげあし</option>
				<option value="ねんちゃく" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'ねんちゃく' ? 'selected' : '' ?>>ねんちゃく</option>
				<option value="のろわれボディ" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'のろわれボディ' ? 'selected' : '' ?>>のろわれボディ</option>
				<option value="はっこう" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'はっこう' ? 'selected' : '' ?>>はっこう</option>
				<option value="はやおき" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'はやおき' ? 'selected' : '' ?>>はやおき</option>
				<option value="ひらいしん" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'ひらいしん' ? 'selected' : '' ?>>ひらいしん</option>
				<option value="ふくがん" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'ふくがん' ? 'selected' : '' ?>>ふくがん</option>
				<option value="ふみん" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'ふみん' ? 'selected' : '' ?>>ふみん</option>
				<option value="ふゆう" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'ふゆう' ? 'selected' : '' ?>>ふゆう</option>
				<option value="ほうし" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'ほうし' ? 'selected' : '' ?>>ほうし</option>
				<option value="ほのおのからだ" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'ほのおのからだ' ? 'selected' : '' ?>>ほのおのからだ</option>
				<option value="ぼうおん" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'ぼうおん' ? 'selected' : '' ?>>ぼうおん</option>
				<option value="みずのベール" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'みずのベール' ? 'selected' : '' ?>>みずのベール</option>
				<option value="むしのしらせ" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'むしのしらせ' ? 'selected' : '' ?>>むしのしらせ</option>
				<option value="めんえき" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'めんえき' ? 'selected' : '' ?>>めんえき</option>
				<option value="もうか" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'もうか' ? 'selected' : '' ?>>もうか</option>
				<option value="もらいび" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'もらいび' ? 'selected' : '' ?>>もらいび</option>
				<option value="やるき" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'やるき' ? 'selected' : '' ?>>やるき</option>
				<option value="ようりょくそ" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'ようりょくそ' ? 'selected' : '' ?>>ようりょくそ</option>
				<option value="よちむ" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'よちむ' ? 'selected' : '' ?>>よちむ</option>
				<option value="りんぷん" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'りんぷん' ? 'selected' : '' ?>>りんぷん</option>
				<option value="クリアボディ" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'クリアボディ' ? 'selected' : '' ?>>クリアボディ</option>
				<option value="シェルアーマー" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'シェルアーマー' ? 'selected' : '' ?>>シェルアーマー</option>
				<option value="シンクロ" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'シンクロ' ? 'selected' : '' ?>>シンクロ</option>
				<option value="スキルリンク" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'スキルリンク' ? 'selected' : '' ?>>スキルリンク</option>
				<option value="スナイパー" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'スナイパー' ? 'selected' : '' ?>>スナイパー</option>
				<option value="ダウンロード" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'ダウンロード' ? 'selected' : '' ?>>ダウンロード</option>
				<option value="テクニシャン" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'テクニシャン' ? 'selected' : '' ?>>テクニシャン</option>
				<option value="トレース" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'トレース' ? 'selected' : '' ?>>トレース</option>
				<option value="ノーてんき" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'ノーてんき' ? 'selected' : '' ?>>ノーてんき</option>
				<option value="ノーガード" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'ノーガード' ? 'selected' : '' ?>>ノーガード</option>
				<option value="フィルター" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'フィルター' ? 'selected' : '' ?>>フィルター</option>
				<option value="プレッシャー" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'プレッシャー' ? 'selected' : '' ?>>プレッシャー</option>
				<option value="ヘドロえき" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'ヘドロえき' ? 'selected' : '' ?>>ヘドロえき</option>
				<option value="マイペース" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'マイペース' ? 'selected' : '' ?>>マイペース</option>
				<option value="マジックガード" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'マジックガード' ? 'selected' : '' ?>>マジックガード</option>
				<option value="メロメロボディ" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'メロメロボディ' ? 'selected' : '' ?>>メロメロボディ</option>
				<option value="リーフガード" <?php echo isset($_GET['characteristic']) && $_GET['characteristic'] == 'リーフガード' ? 'selected' : '' ?>>リーフガード</option>
			</select>
		</div>
		<button type="submit" class="btn btn-default" name="search">検索</button>
	</form>

</div>
<div class="col-xs-6 col-xs-offset-3">
	<?php //③取得データを表示する ?>
	<?php if(isset($userData) && count($userData)): ?>
		<p class="alert alert-success"><?php echo count($userData) ?>件見つかりました。</p>
		<table class="table">
			<thead>
				<tr>
					<th>名前</th>
					<th>タイプ</th>
					<th>特性</th>
					<th>詳細</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($userData as $row): ?>
					<tr>
						<td><?php echo htmlspecialchars($row['name']) ?></td>
						<td><?php echo htmlspecialchars($row['type']) ?></td>
						<td><?php echo htmlspecialchars($row['characteristic']) ?></td>
						<td>
							<!-- <form name="form1" method="post" action="love.php"> -->
							<form name="form1" method="post" action="syosai.php">
							<button type="submit" name="search_key" value="<?php echo htmlspecialchars($row['name']) ?>">詳細</button>
						</td>

						</form>

						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php else: ?>
		<p class="alert alert-danger">検索対象は見つかりませんでした。</p>
	<?php endif; ?>

</div>
</body>
</html>
