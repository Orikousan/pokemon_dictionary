========== ========== ==========

  Readme.txt(ポケモン図鑑)  ver.1.0

========== ========== ==========

【 ソフト名 】ポケモン図鑑
【 製 作 者 】中井 俊
【  種  別  】フリーウェア
【 開発環境 】Atom 1.25.1など
【 動作環境 】MacOS Mojaveなど
【バージョン】1.0
【最終更新日】2020/12/27
【同梱ファイル】readme.txt, ,初期化スクリプト.txt, model.php, index.php list.php, config/database.php, ポケモン/151匹分のポケモンのpng画像


---------- ----------
◇ 概要 ◇
	これらはポケモン図鑑を構成するためのファイルです。

◇ 動作条件 ◇
	XAMPP, manager-osx, mysql, Google Chrome

◇ ファイル構成 ◇
	[readme.txt]
		このファイル。

	[初期化スクリプト.txt]
		データベースの初期化に必要なことが書かれたファイル。

	[model.php]
		index.phpを動かすのに必要なファイル。このファイルを直接ブラウザで表示することはありません。

	[index.php]
		index.phpをGoogle Chromeなどのブラウザで立ち上げてください。具体的にはURLにlocalhost/index.phpと記入してエンターキーを押してください。

	[syosai.php]
		model.phpから画面遷移するファイルです。

	[database.php]
		DBの接続情報について書かれたファイルです。model.phpやindex.phpが利用しています。configフォルダの中にあります。

	[love.php]
		データベースのポケモンのお気に入り度を更新するためのファイルです。
　
	[151匹分のポケモンのpng画像]
		ポケモンフォルダの中に151枚のpng画像があります。list.phpで画像を表示させるのに必要です。(例　アーボ.png)



◇ インストール ◇
	このpokemon_dictionaryフォルダの中身をhtdocsフォルダの真下に配置してください。

◇ アンインストール ◇
	展開してできたフォルダをまるごと削除すれば、アンインストール完了です。

◇ つかいかた ◇
	pokemon_dictionary-masterの中にあるファイルやフォルダをそのままhtdocフォルダの真下に配置してください。次に、初期化スクリプト.txtに従ってターミナルでユーザの作成、データベースの設計などを行なってください。そしてそれらの作業が終わったらXAMPP(manager-osx)のMySQL DatabseとApache Web Serverを起動してCoocle ChromeなどのブラウザのURL欄にlocalhost/index.phpと記入してエンターキーを押してください。

◇ 免責 ◇
	このソフトを使用することにより発生したいかなる損害についても、製作者は責任を負いません。

◇ 履歴 ◇
	09/08/02 ver1.0完成。
