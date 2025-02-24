<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <title>Дерево каталога.</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="js/index.js" defer></script>
  <link rel="stylesheet"  href="css/style.css">
</head>

<body>

<?php
  
  if (isset($_POST["name"]) && isset($_POST["category"])) {
     
  $username = htmlspecialchars($_POST["name"]);
  $category= htmlspecialchars($_POST["category"]);

  try {
    $conn = DB::db_connection();
    $sql = $conn->prepare("INSERT INTO `catalog_tree` (name, parent_id) VALUES ('$username', $category)");
    $sql->execute();
    $affectedRowsNumber = $sql;
    // если добавлена как минимум одна строка
    if($affectedRowsNumber > 0 ){
        echo "Data successfully added: name=$username  category= $category";  
    }
  }
    catch (PDOException $e) {
      echo "Database error: " . $e->getMessage();
  }
}
  ?>
  
<div class="flex-shrink-0 p-3" style="width: 280px;">
  <ul class="list-unstyled ps-0">
    <?php   echo Catalog::build_tree(Catalog::sort(), 0);  ?>
  </ul>

  </div>
  
  <section class="modal hidden">
    <div class="flex">
      <button class="btn-close">⨉</button>
    </div>
    
    <form method="post">
      <div>
        <h3>Добавление нового элемента.</h3>
      </div>
      
      <input type="text" name="name" placeholder="Наимерование" />
      
      <select name="category">
        <option value="0">Новый узел</option>
        <?php  echo Select::connection(); ?>
      </select>
      
      <button class="btn" type="submit">Добавить</button>
    </form>
  </section>
  
  <div class="overlay hidden"></div>
  
  <button class="btn btn-open">Создание</button>
  
  <?
    header("Refresh: 0");
    
    

  
  ?>

      
      
</body>


</html>