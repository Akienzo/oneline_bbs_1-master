<?php

  //echo 'POST送信された！';
  //データベースに接続
  // ステップ1.db接続
  $dsn = 'mysql:dbname=oneline_bbs_1-master;host=localhost';
    
  // 接続するためのユーザー情報
  $user = 'root';
  $password = '';

  // DB接続オブジェクトを作成
  $dbh = new PDO($dsn,$user,$password);

  // 接続したDBオブジェクトで文字コードutf8を使うように指定
  $dbh->query('SET NAMES utf8');

  //POST送信が行われたら、下記の処理を実行
  //テストコメント
  if(isset($_POST) && !empty($_POST)){



    //SQL文作成(INSERT文)
    $sql = "INSERT INTO `bbs_post`(`nickname`, `comment`, `created`) ";
    $sql .="VALUES ('".$_POST['nickname']."','".$_POST['comment']."',now())";

    //var_dump($sql);
    //INSERT文実行
    $stmt=$dbh->prepare($sql);
    $stmt->execute();
  }

  //SQL文作成(SELECT文)
  $sql = 'SELECT * FROM `bbs_post`';
  
  //SQL文実行
  $stmt = $dbh->prepare($sql);
  $stmt->execute();

  $posts = array();

  //var_dump($stmt);
  while(1){

    //実行結果として得られたデータを表示
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    if($rec == false){
      break;
    }

    $posts[]=$rec;
    // echo $rec['id'];
    // echo $rec['nickname'];
    // echo $rec['comment'];
    // echo $rec['created'];


  }
    //データベースから切断
    $dbh=null;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>セブ掲示版</title>

</head>
<body>
    
</body>
</html>



