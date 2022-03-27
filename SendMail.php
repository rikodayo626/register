<?php
    require_once("db.php");
    // セッション開始
    session_start();

    // 送信内容の取得
    $familyName = $_SESSION["familyName"];
    $firstName = $_SESSION["firstName"];
    $mail = $_SESSION["mail"];
    $password = $_SESSION["password"];
    $from = "r.kojima@rutla.jp";

    // DB登録
    $pdo = db();
    $query = "INSERT INTO USER(familyName, firstName, mail, password, delFlg) VALUES (:familyName, :firstName, :mail, :password, '1');";
    $stmt = $pdo -> prepare($query);
    $stmt -> bindValue(':familyName', $familyName);
    $stmt -> bindValue(':firstName', $firstName);
    $stmt -> bindValue(':mail', $mail);
    $stmt -> bindValue(':password', $password);
    $stmt -> execute();


    // メール設定
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $to = $mail;
    $subject = "ユーザー登録が完了しました。";
    $honbun = $familyName." ".$firstName."様\r\n";
    $honbun .= "ユーザー登録が完了しました。";
    $headers = "From:".mb_encode_mimeheader('テスト') ."<".$from.">";
    mb_send_mail($to, $subject, $honbun, $headers);

    include_once("success.html");
?>