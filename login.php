<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン画面</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column; 
      height: 100vh;
      margin: 0;
      background-color: #f0f0f0;
    }

    form, .login_filed {
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    .login_filed {
      background: none; 
      box-shadow: none;
      padding: 0; 
    }

    h1 {
      text-align: center;
      color: #333;
    }

    fieldset {
      border: none;
    }

    div {
      margin-bottom: 15px;
    }

    input[type="text"] {
      width: 100%;
      padding: 8px;
      margin-top: 4px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .btn {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .btn:hover {
      background-color: #0056b3;
    }

    a {
      display: block;
      text-align: center;
      margin-top: 10px;
      color: #007bff;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="login_filed">
      <h1>ログイン画面</h1>
  </div>
  
  <form action="login_act.php" method="POST">
    <fieldset class="text_area">
      <div>
        メールアドレス <input type="text" name="mail_address">
      </div>
      <div>
        パスワード <input type="text" name="password">
      </div>
      <div>
        <button class="btn">ログイン</button>
      </div>
      <a href="register.php">新規登録</a>
    </fieldset>
  </form>

</body>

</html>
