【ディレクトリ構成説明】
・application...CodeIgniterにおけるユーザが触る部分
・application/controllers...サイトのバックエンドにあたる部分の操作を記述
・application/models...コントローラとデータベースの間のやり取りを記述
・application/views...表示にあたる部分を記述
・application/libraries...自作ライブラリがあればここに格納
・application/config...設定情報が書いてある。必要に応じて編集

・assets...cssやjsなどを格納
・assets/css...cssのデータを格納
・assets/js...babelでコンパイルされたJavaScript(ES5)のソースの格納場所
・assets/images...画像ファイルの格納場所
・assets/src...scssやes6のソースを格納

多分その他のファイルは触らないほうがいいかもしれません。混乱を招きますのでww

あと、package.jsonを少しアレンジしています。


【コマンド説明】
注意)npmコマンドは環境によってはsudoが必要な場合があります。permission deniedというエラーが出たら実験してみましょう

・scss assets/src/<filename>.scss:assets/css/<filename>.css --style expanted
このコマンドでassets/src/<filename>.scssをassets/css/<filename>.cssにコンパイルします。 --style expantedについては、魔法の呪文程度に思っておいてください。コンパイルする際に、ちゃんと改行を入れて見やすいようにしてくれてるだけです。

・npm run build
package.jsonをいじりました。このコマンドで全てのes6のファイルがes5にコンパイルされます。

【ページ説明】
・index...ログイン前の宣伝用ページ
・home...タイムライン
・login...ログイン画面
・signup...アカウント登録
・profile...マイページ