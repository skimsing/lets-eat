<?php
require 'config.php';
require 'validation.php';
// $TABLENAME = "recipes";
// connect to database, return PDO
function db_connect() {
    try {
      $connectionString = 'mysql:host='.DBHOST.';dbname='.DBNAME; 
      $user = DBUSER;
      $pass = DBPASS;
  
      $pdo = new PDO($connectionString, $user, $pass);
      $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
      return $pdo;
    }
    catch (PDOException $e)
    {
      die($e->getMessage());
    }
  }
  // initalize db
function createDB(){
    global $pdo;
    try {
      $sql = "CREATE DATABASE" .DBNAME;
      $pdo ->exec($sql);
    } catch (\Throwable $err) {
      echo $pdo . "<p>something went wrong creating db".$err ->getMesage()."</p>";
    }
  }
function createTable(){
    global $pdo;
    try {
      $sql = `CREATE TABLE {$TABLENAME} (
        id INT(11) UNIQUE AUTO INCREMENT,
        title VARCHAR(40), 
        image VARCHAR(300),1 
        prepTime INT(11), 
        cookTime INT(11), 
        cusine ENUM('Vietnamese','Chinese','Japanese','Indian','Western','Korean','Greek','Mexican','Middle Eastern','Other'), 
        meal SET('Breakfast','Brunch','Lunch','Dinner','Dessert','Appetizers','Snack'), 
        restrictions ENUM('Vegan','Vegetarian','Halal','Kosher','None'),
        ingredients LONGTEXT,
        steps LONGTEXT,
        PRIMARY KEY (id)
        )`;
        $pdo ->exec($sql);
    } catch (\Throwable $err) {
      echo $pdo . "<p>something went wrong creating table".$err ->getMesage()."</p>";
    }
  }
function dropDB(){
  global $pdo;
  $sql = "DROP DATABASE" . DBNAME;
  $stmnt = $pdo->prepare($sql);
  $stmnt -> exceute();
  }


// FUNCTIONS 
// handle search form and gets all recipes, save to all recipes pdo
function get_allRecipes(){
    global $pdo;
    global $allrecipes;
    if(isset($_GET['searchterm'])){
      $searchterm = $_GET['searchterm'];
      $sql="SELECT * FROM " .TABLENAME. " WHERE title LIKE '%{$searchterm}%'";
    }
    else{
      $sql="SELECT * FROM " .TABLENAME. " ORDER BY id DESC";
    }
    $recipes=$pdo->query($sql); 
  
    while($row = $recipes -> fetch()){
        $allrecipes[] = $row; 
    };
}

function get_oneRecipe(){
  global $pdo;
  global $onerecipe;
  // global $id;
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql="SELECT * FROM " .TABLENAME. " WHERE id='$id'";
    $recipes=$pdo->query($sql); 
    
    while($row = $recipes -> fetch()){
        $onerecipe[] = $row; 
    };
  }
}

// handle upload recipe (post)
function handle_form_submission() {
  global $pdo;

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    // global $testResultObj;
    // foreach ($testResultObj as $item => $val){
    //   echo $item . " : " . $val;
    // }
    if(is_valid()){
      // echo "<p> from db post</p>";
      $sql="INSERT INTO ".TABLENAME.
      "(title, image, prepTime, cookTime, cusine, meal, restrictions, ingredients, steps) 
      VALUES (:title,:image, :prepTime, :cookTime, :cusine, :meal, :restrictions, :ingredients, :steps)";
     
      $statement=$pdo->prepare($sql);
     
      $statement->bindValue(':title',$_POST['title']);
      $statement->bindValue(':image',$_POST['image']);
      $statement->bindValue(':prepTime',$_POST['prepTime']);
      $statement->bindValue(':cookTime',$_POST['cookTime']);
      $statement->bindValue(':cusine',$_POST['cusine']);
      $statement->bindValue(':meal',$_POST['meal']);
      $statement->bindValue(':restrictions',$_POST['restrictions']);
      $statement->bindValue(':ingredients',$_POST['ingredients']);
      $statement->bindValue(':steps',$_POST['steps']);
     
      $statement->execute(); 
    }
    else echo "<p> something went wrong submitting to server </p>"; 
  }
}

$pdo = null;