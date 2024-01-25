<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>送り先住所</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    fieldset {
      border: none;
      margin: 0;
      padding: 0;
    }

    legend {
      font-size: 24px;
      color: #333;
      margin-bottom: 10px;
    }

    div {
      margin-bottom: 12px;
    }

    input[type="text"] {
      width: calc(100% - 20px);
      padding: 10px;
      margin-top: 4px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .button {
      display: inline-block;
      width: auto;
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      text-decoration: none;
      border-radius: 4px;
      text-align: center;
    }

    .button:hover {
      background-color: #0056b3;
    }

    div.button-container {
      text-align: center;
    }
  </style>
</head>

<body>
  <form action="" method="POST">
    <fieldset>
      <legend>送り先住所</legend>
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
        名前 <input type="text" name="name">
      </div>
      <div class="button-container">
        <a href="tray_read.php" class="button">依頼する</a>
      </div>
    </fieldset>
  </form>
</body>

</html>
