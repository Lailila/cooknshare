<?php
//env.phpとdbconnect.phpはセキュリティ面で分けられている。

require_once './env.php';//env.phpを一度だけ読み込む
function connect(){

//使いやすいように定数から変数にする
  $host = DB_HOST;
  $db = DB_NAME;
  $user = DB_USER;
  $pass = DB_PASS;

//DBへの接続情報を$dsnとして登録する。DBへ接続するときの住所のようなもの。
  $dsn ="mysql: host=$host; dbname=$db; charset=utf8mb4";

  try{//tryの中には例外が発生する可能性のあるコードを書く
    //PDO オブジェクトを作って接続
    //pdo=PHPがDBとやり取りするための仕組み。
    $pdo = new PDO($dsn,$user,$pass,[//$dsn, $user, $pass を使って DB に接続
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,//エラーが出たらcatch
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC//SELECTしたら「連想配列」で結果を返す（便利）
    ]);
    echo 'connection succeeded!';
  }catch(PDOException $e){//catchの中には例外が発生した場合に行う処理を書く
    echo 'error:'.$e->getMessage();//例えば "error: SQLSTATE[HY000] [1045] Access denied for user..."が表示される
    exit();
  }
}

echo connect();