<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Recipes</title>
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
        <div class="filter">
            <h2>Browse by type</h2>
            <form id="browse-filter" name="browse-filter">
                <label for="cusine">Type of Cusine</label>
                <select name="cusine" id="cusine">
                    <option value="All">All</option>
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
                <label for="meal">Meal Type</label>
                <select name="meal" id="meal">
                    <option value="All">All</option>
                    <option value-="Breakfast">Breakfast</option>
                    <option value="Brunch">Brunch</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Dinner">Dinner</option>
                    <option value="Dessert">Dessert</option>
                    <option value="Appetizers">Appetizers</option>
                    <option value="Snack">Snack</option>
                </select>
                <label for="restrictions">Meal Restrictions</label>
                <select name="restrictions" id="restrictions">
                    <option value="All">All</option>
                    <option value="Vegan">Vegan</option>
                    <option value="Vegetarian">Vegetarian</option>
                    <option value="Halal">Halal</option>
                    <option value="Kosher">Kosher</option>
                    <option value="None">None</option>
                </select>
                <button type="submit" id="submitFilters">Filter Recipes</button>
            </form>
        </div>
        <div class="all-recipes">
            <?php show_preview();?>
            <script type="text/javascript">
                $(document).ready(function() {
                    const recipeObj = <?php global $allrecipes; echo json_encode($allrecipes); ?>;
                    var filterCusine;
                    var filterMeal;
                    var filterRestriction;
                    $("#submitFilters").on("click",function(e){
                        e.preventDefault();
                        filterCusine = $("#cusine").val();
                        filterMeal = $("#meal").val();
                        filterRestriction = $("#restrictions").val();
                        filterRecipes(recipeObj)
                    });
                    function filterRecipes(dataObj) {
                        var filterIds = [];
                        var filter1 = [];
                        var filter2 = [];
                        var filter3 = [];
                        // filter restrictions
                        dataObj.filter((items) => {
                        if (filterRestriction == "All") {
                            filter1.push(items);
                        } else if (filterRestriction == items[7]) {
                            filter1.push(items);
                        }
                        });
                        // filter cusine
                        if (filter1.length != 0) {
                        filter1.filter((items) => {
                            if (filterCusine == "All") {
                            filter2.push(items);
                            } else if (filterCusine == items[5]) {
                            filter2.push(items);
                            }
                        });
                        }
                        // filter meal
                        if (filter2.length != 0) {
                        filter2.filter((items) => {
                            if (filterMeal == "All") {
                            filter3.push(items);
                            } else if (items[6].includes(filterMeal)) {
                            filter3.push(items);
                            }
                        });
                        }
                        if(filter3.length){
                        filter3.forEach((items)=>{
                            filterIds.push(items[0])
                        })
                        }
                        console.log(filterIds)
                        if(filterIds.length != 0){
                            filterIds.forEach(element => {
                                $(`#${element}`).addClass("active");
                            });
                        }
                        $(".recipe").not(".active").toggle();
                    }

                });
            </script>
        </div>
    </div>
</body>
</html>