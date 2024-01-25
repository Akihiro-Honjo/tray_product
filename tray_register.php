<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>トレー登録画面</title>
</head>

<body>
  <form enctype="multipart/form-data" action="tray_register_act.php" method="POST">
    <fieldset>
      <legend>トレー登録画面</legend>
      <div>
        メーカー <input type="text" name="maker">
      </div>
      <div>
        カテゴリー<select name="category">
                   <option value=""></option>
                   <option value="A">鮮魚</option>
                   <option value="B">塩干</option>
                   <option value="C">寿司</option>
                   <option value="D">精肉</option>
                   <option value="E">米飯</option>
                   <option value="F">惣菜</option>
                   <option value="G">青果</option>
                   <option value="H">汎用</option>
                   </select> 
      </div>
      <div>
        画像 <input type="file" name="image">
      </div>
      <div>
        商品名 <input type="text" name="product">
      </div>
      <div>
        用途 <input type="text" name="purpose">
      </div>

      <div>
        <button>登録する</button>
      </div>
      <a href="login.php">ログイン画面</a>
    </fieldset>
  </form>

</body>

</html>