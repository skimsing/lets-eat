<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Your Recipe</title>
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="icomoon/style.css"/> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script type="text/javascript" src="templates/functions/helpers.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Borel&family=Chivo:wght@200;400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Let's Eat</h1>
        <div class="header-nav">
        <!-- <span class="icon-menu"></span> -->
            <nav class="show-nav">
                <ul>
                    <li><a href="./home">home</a></li>
                    <li><a href="./upload">upload recipe</a></li>
                    <li><a href="./browse">browse recipes</a></li>
                </ul>
            </nav>
            <!-- <span class="icon-search"></span> -->
            <form id="nav-search" class="nav-search show-search" method="get" action="./browse?searchterm={$searchterm}">
                <input type="text" name="searchterm" placeholder="search for a recipe">
                <button type="submit">Go!</button>
            </form>
        </div>
    </header>
    <div class="main">
        <div class="upload-form">
            <h2> Upload Your Recipe </h2>
            <form id="upload-recipe" name="upload-recipe" method="post" action="index.php">
                <!-- image link, recipe name, steps, cusine type dropdown,  -->
                <label for="title">Title of Recipe:</label>
                <input type="text" minlength="3" name="title" id="title" placeholder="enter recipe title" required>
            
                <label for="image">Upload a Photo:</label>
                <input type="text" name="image"id="image" placeholder="enter image link" required>
            
                <label for="prepTime">Preparation Time (mins):</label>
                <input type="number" min="1" max="6000" name="prepTime" id="prepTime" placeholder="enter amount of time" required>
            
                <label for="cookTime">Cooking Time needed (mins):</label>
                <input type="number" min="1" max="6000" name="cookTime" id="cookTime" placeholder="enter amount of time" required>
            
                <label for="cusine">Type of Cusine:</label>
                <select name="cusine" id="cusine">
                    <option value="Vietnamese">Vietnamese</option>
                    <option value="Chinese">Chinese</option>
                    <option value="Japanese">Japanese</option>
                    <option value="Indian">Indian</option>
                    <option value="Western">Western</option>
                    <option value="Korean">Korean</option>
                    <option value="Greek">Greek</option>
                    <option value="Mexican">Mexican</option>
                    <option value="Middle Eastern">Middle Eastern</option>
                    <option value="Other">Other</option>
                </select>

                <label for="meal">Meal Type (you may select more than one): </label>
                <select name="meal" id="meal" multiple>
                    <option value-="Breakfast">Breakfast</option>
                    <option value="Brunch">Brunch</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Dinner">Dinner</option>
                    <option value="Dessert">Dessert</option>
                    <option value="Appetizers">Appetizers</option>
                    <option value="Snack" selected>Snack</option>
                </select>

                <label for="restrictions">Meal Restrictions:</label>
                <select name="restrictions" id="restrictions">
                    <option value="Vegan">Vegan</option>
                    <option value="Vegetarian">Vegetarian</option>
                    <option value="Halal">Halal</option>
                    <option value="Kosher">Kosher</option>
                    <option value="None" selected>None</option>
                </select>
                <!-- NEW -->
                <label for="ingredients">Ingredients:</label>
                <textarea name="ingredients" id="ingredients" rows="5" placeholder="please separate each item with a comma" required></textarea>
                <label for="steps">Steps:</label>
                <textarea name="steps" id="steps" rows="5" placeholder="(enter each step on a new line)" required></textarea>
                <!-- NEW -->
                <button type="submit" name='submit-button'>Submit Recipe</button>
            </form>
        </div>
    </div>
</body>
</html>