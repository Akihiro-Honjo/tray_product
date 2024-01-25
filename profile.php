<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー情報登録画面</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #f0f0f0;
    }

    form {
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 300px; /* フォームの幅を指定 */
    }

    fieldset {
      border: none;
      padding: 0;
      margin: 0;
    }

    legend {
      text-align: center;
      font-size: 24px;
      color: #333;
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

    button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
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
  <form action="profile_act.php" method="POST">
    <fieldset>
      <legend>ユーザー情報登録画面</legend>
      <div>
        名前 <input type="text" name="name">
      </div>
      <div>
        郵便番号 <input type="text" name="post_number">
      </div>
      <div>
        住所 <input type="text" name="address">
      </div>
      <div>
        電話番号 <input type="text" name="tel">
      </div>
      <div>
        会社名 <input type="text" name="company">
      </div>
      <div>
        <button>登録する</button>
      </div>
      <a href="login.php">ログイン画面</a>
    </fieldset>
  </form>
</body>

</html>
