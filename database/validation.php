<?php
$testResultObj = Array();
// function is_valid(){
//     global $testResultObj;
//     if($_SERVER["REQUEST_METHOD"] == "POST")
//     {
//       if( isset($_POST['prepTime']) && isset($_POST['cookTime'] )){
//         foreach($_POST as $type => $value){
//           if($type == 'cookTime' | $type == 'prepTime'){
//             $isValidLength = "#^\d{1,4}$#";
//             if(preg_match($isValidLength, $value) == 1){
//               echo "<p>true ".$value."</p>";
//               $testResultObj[$type] = TRUE;
//             }
//             else {
//               $testResultObj[$type] = FALSE;
//               echo "<p>false ".$type."</p>";
//               return FALSE;
//             }
//           }
//         }
//         echo "<p>HELLO FROM VALID</p>";
//       }
//       elseif(isset($_POST['image'])){
//         $isValidLink = "#^[\w\-]+(\/[^\/])*[\w\-]*\.((jpg)|(png)|(gif)|(jpeg))$#";
//         if(preg_match($isValidLink, $_POST['image']) == 1) {
//           $testResultObj['image'] = TRUE;
//           echo "<p>true ".$_POST['image']."</p>";
//         }
//         else {
//           $testResultObj['image'] = FALSE;
//           echo "<p>false image</p>";
//           return FALSE;
//         }
//       }
//     elseif(isset($_POST['meal'])){
//       $testItems = explode (",",$_POST['meal']);
//         foreach($testItems as $value){
//            switch ($value){
//               case "Breakfast":
//               case "Brunch":
//               case "Lunch":
//               case "Dinner":
//               case "Dessert":
//               case "Appetizers":
//               case "Snack":
//                 $testResultObj['meal'] = TRUE;
//                 // echo "<p>true meal".$_POST['meal']."</p>";
//                 break;
//               default:
//               echo "<p>false meal</p>";
//                 $testResultObj['meal'] = FALSE;
//            }
//           }
//       }
//       elseif(isset($_POST['cusine'])){
//         $testItems = explode(",",$_POST['cusine']);
//           foreach($testItems as $value){
//             switch($value){
//               case "Vietnamese":
//               case "Chinese":
//               case "Japanese":
//               case "Indian":
//               case "Western":
//               case "Korean":
//               case "Greek":
//               case "Mexican":
//               case "Middle Eastern":
//               case "Other":
//                 $testResultObj['cusine'] = TRUE;
//                 // echo "<p>false true".$_POST['cusine']."</p>";
//                 break;
//               default:
//                 $testResultObj['cusine'] = FALSE;
//                 echo "<p>false cusine</p>";
//                 return FALSE;
//             }
//           }
//       }
//     elseif(isset($_POST['restrictions'])){
//       $testItems = explode(",", $_POST['restrictions']);
//         foreach($testItems as $value){
//            switch($value){
//               case "Vegan":
//               case "Vegetarian":
//               case "Halal":
//               case "Kosher":
//               case "None":
//                 $testResultObj['restrictions'] = TRUE;
//                 // echo "<p>true restriction".$_POST['restrictions']."</p>";
//                 break;
//               default:
//                 $testResultObj['restrictions'] = FALSE;
//                 echo "<p>false restrictions</p>";
//                 return FALSE;
//             }
//         }
//     }
//     elseif(isset($_POST['ingredients']) | isset($_POST['steps'])){
//       $isCSV = "#^([^\,].*\,).*\,?#";
//       foreach ($_POST as $type => $value){
//        if (preg_match($isCSV, $value) == 1) {
//         $testResultObj[$type] = TRUE;
//         // echo "<p> true ".$type. $value."</p>";
//       }
//        else {
//         echo "<p> false ".$type."</p>";
//         $testResultObj[$type] = FALSE;
//        }
//       }
//     }
//     foreach ($testResultObj as $item => $value){
//       echo "<p> ".$item." : ".$value."</p>";
//     }
//     // return TRUE;
//   }
// }
function is_valid(){
    global $testResultObj;
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
    if( isset($_POST['title'])
    && isset($_POST['prepTime']) 
    && isset($_POST['cookTime'] ) 
    && isset($_POST['image']) 
    && isset($_POST['meal'])
    && isset($_POST['cusine'])
    && isset($_POST['restrictions'])
    && isset($_POST['ingredients'])
    && isset($_POST['steps'])
    ){
      foreach($_POST as $type => $value){
        if($type == 'title'){
          $hasNumbers = "#\d#";
          if(preg_match($hasNumbers, $value) == 1){
            // if it has numbers return false
            $testResultObj[$type] = FALSE;
            echo "<p>false". $type. ": ".$value."</p>";
            return FALSE;
          }
          else $testResultObj[$type] = TRUE;
        }
        elseif($type == 'cookTime' | $type == 'prepTime'){
          $isValidLength = "#^\d{1,4}$#";
          if(preg_match($isValidLength, $value) == 1){
            // echo "<p>true ".$value."</p>";
            $testResultObj[$type] = TRUE;
          }
          else {
            $testResultObj[$type] = FALSE;
            echo "<p>false". $type. ": ".$value."</p>";
            return FALSE;
          }
        }
        elseif($type == 'image'){
          $isValidLink = "#^[\w\-]+(\/[^\/])*[\w\-]*\.((jpg)|(png)|(gif)|(jpeg))$#";
          if(preg_match($isValidLink, $_POST['image']) == 1) {
            $testResultObj['image'] = TRUE;
            // echo "<p>true ".$value."</p>";
          }
          else {
            $testResultObj['image'] = FALSE;
            echo "<p>false". $type. ": ".$value."</p>";
            return FALSE;
          }
        }
        elseif($type == 'meal'){
          $testItems = explode (",",$value);
          foreach($testItems as $test){
            switch ($test){
              case "Breakfast":
              case "Brunch":
              case "Lunch":
              case "Dinner":
              case "Dessert":
              case "Appetizers":
              case "Snack":
                $testResultObj['meal'] = TRUE;
                // echo "<p>true meal".$_POST['meal']."</p>";
                break;
              default:
              echo "<p>false". $type. ": ".$test."</p>";
                $testResultObj['meal'] = FALSE;
            }
          }
        }
        elseif($type == 'cusine'){
          $testItems = explode(",",$_POST['cusine']);
          foreach($testItems as $test){
            switch($test){
              case "Vietnamese":
              case "Chinese":
              case "Japanese":
              case "Indian":
              case "Western":
              case "Korean":
              case "Greek":
              case "Mexican":
              case "Middle Eastern":
              case "Other":
                $testResultObj['cusine'] = TRUE;
                // echo "<p>false true".$_POST['cusine']."</p>";
                break;
              default:
                $testResultObj['cusine'] = FALSE;
                echo "<p>false". $type. ": ".$test."</p>";
                return FALSE;
            }
          }
        }
        elseif($type == 'restrictions'){
          $testItems = explode(",", $_POST['restrictions']);
          foreach($testItems as $test){
            switch($test){
              case "Vegan":
              case "Vegetarian":
              case "Halal":
              case "Kosher":
              case "None":
                $testResultObj['restrictions'] = TRUE;
                // echo "<p>true restriction".$_POST['restrictions']."</p>";
                break;
              default:
                $testResultObj['restrictions'] = FALSE;
                echo "<p>false". $type. ": ".$test."</p>";
                return FALSE;
            }
          }
        }
        elseif($type == 'ingredients' | $type == 'steps'){
          $isCSV = "#^([^\,].*\,).*\,?#";
          if (preg_match($isCSV, $value) == 1) {
            $testResultObj[$type] = TRUE;
            // echo "<p> true ".$type. $value."</p>";
          } else {
            echo "<p>false". $type. ": ".$value."</p>";
            $testResultObj[$type] = FALSE;
            return FALSE;
          }
        }
      }
      // echo "<p>HELLO FROM VALID</p>";
      return TRUE;
    }
  }
}
