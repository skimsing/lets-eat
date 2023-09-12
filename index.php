<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
//---------------- IMPORT FILES ----------------//
require_once 'database/database.php';
require 'templates/functions/template_functions.php';
//connect to database: PHP Data object representing Database connection
$pdo = db_connect();

//---------------- INITIALIZE DATABASE ----------------//
// create initial database and make table
// createDB();
// createTable();

//---------------- GLOBAL VARIABLES----------------//
// global array of posts, to be fetched from database
$allrecipes = [];
// global array of recipes by name
$searchresults = [];
$onerecipe = [];


//---------------- POST QUERIES ----------------//
// submit recipe to database
handle_form_submission();

//---------------- GET QUERIES ----------------//
get_allRecipes();
get_oneRecipe();

//---------------- ROUTER ----------------//
// parses url so that switch case will ignore query params
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// routes
switch ($request) {
    case '/2030-project/' ;
    case '/2030-project/index' ;
    case '/2030-project/home' ;
    case '/2030-project/index.php';
        require __DIR__ . '/templates/index.php';
        break;
    case '/2030-project/upload' :
        require __DIR__ . '/templates/upload.php';
        break;
    case '/2030-project/browse' :
        require __DIR__ . '/templates/browse.php';
        break;
    case '/2030-project/view' :
        require __DIR__ . '/templates/recipe.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/templates/error.php';
        break;
}