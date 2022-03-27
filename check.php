<?php
    // セッション開始
    session_start();

    // 入力チェック
    $errorMsg = array();
    // 氏名
    if ($_POST["familyName"] === "") {
        array_push($errorMsg, "氏名(姓)が入力されていません。<br>");
    }
    if ($_POST["firstName"] === "") {
        array_push($errorMsg, "氏名(名)が入力されていません。<br>");
    }
    // メールアドレス
    if ($_POST["mail"] === "") {
        array_push($errorMsg, "メールアドレスが入力されていません。<br>");
    }
    if ($_POST["mailKakunin"] === "") {
        array_push($errorMsg, "メールアドレス(確認用)が入力されていません。<br>");
    }
    if ($_POST["mail"] !== $_POST["mailKakunin"]) {
        array_push($errorMsg, "メールアドレスとメールアドレス(確認用)が一致していません。<br>");
    }
    // パスワード
    if ($_POST["password"] === "") {
        array_push($errorMsg, "パスワードが入力されていません。<br>");
    }

    // セッションに入力値を保存
    $_SESSION["familyName"] = isset($_POST["familyName"]) ? $_POST["familyName"] : null;
    $_SESSION["firstName"] = isset($_POST['firstName']) ? $_POST['firstName'] : null;
    $_SESSION["mail"] = isset($_POST['mail']) ? $_POST['mail'] : null;
    $_SESSION["mailKakunin"] = isset($_POST['mailKakunin']) ? $_POST['mailKakunin'] : null;
    $_SESSION["password"] = isset($_POST['password']) ? $_POST['password'] : null;

    if ($errorMsg) {
        $_SESSION["errorMsg"] = $errorMsg;
        include_once("form.html");
    } else {
        include_once("check.html");
    }
?>