<?php
//shows preview of recipe
function show_preview() { 
    global $allrecipes;
    if ($allrecipes){
        foreach ($allrecipes as $recipe){
            echo "<div class='recipe' id='".$recipe['id']."'>";
            echo "<a href='./view?id=".$recipe['id']."' action='index.php'>";
            echo "<img src=" . $recipe['image']. ">";
            echo "<li class=caption>".$recipe['title']."</li>";
            echo "</a>";
            echo "</div>"; 
        }
    }
}

//displays details for one recipe
function show_recipe(){ 
    global $onerecipe;

    if ($onerecipe){
        $recipe = $onerecipe[0];
        echo "<h2 class='recipe-title'>".$recipe['title']."</h2>";
        echo "<div class='img-container'><img src='".$recipe['image']."'/></div>";

        echo "<h3>Recipe Info</h3>";
        echo "<ul class='info'>";
        echo "<li> Preparation Time: ".$recipe['prepTime']."</li>";
        echo "<li> Cooking Time: ".$recipe['cookTime']."</li>";
        echo "<li> Cusine: ".$recipe['cusine']."</li>";
        echo "<li> Ideal for: ".$recipe['meal']."</li>";
        echo "<li> Dietary Restrictions: ".$recipe['restrictions']."</li>";
        echo "</ul>";
        
        echo "<h3>Ingredients</h3>";
        echo "<ul class='ingredients'>";
        if(empty(!$recipe['ingredients'])){
            $ingr_items = json_decode($recipe['ingredients'],true);
            foreach ($ingr_items as $item){
                if ($item != ""){
                    echo "<li>".$item."</li>";
                }
            }
        }
        else echo "<p class='err-msg'> something went wrong loading ingredients</p>";
        echo "</ul>";
        
        echo "<h3>Instructions</h3>";
        echo "<ol class='steps'>";
        
        if(!empty($recipe['steps'])){
            $step_items = json_decode($recipe['steps'], true);
            foreach ($step_items as $step){
                if($step != ""){
                    echo "<li>".$step."</li>";
                }
            }
        }
        else echo "<p class='err-msg'> something went wrong loading steps</p>";
        echo "</ol>";
    }
    else echo "<p class='err-msg'> Oops, something went wrong getting your recipe</p>";
}