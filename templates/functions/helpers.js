$(document).ready(function () {
  //  FILTERS
  // var filterCusine;
  // $("#cusine").change(function () {
  //   filterCusine = $("#cusine").val();
  // });
  // var filterMeal;
  // $("#meal").change(function () {
  //   filterMeal = $("#meal").val();
  // });
  // var filterRestriction;
  // $("#restrictions").change(function () {
  //   filterRestriction = $("#restrictions").val();
  // });
  // get ids of filtered object, and display those objects with ids
  // toggle item display?
  // items[0] = id
  // items[5] = cuisine
  // items[6] = meal
  // items[7] = restrictions
  //  POST ITEMS ----------------------------//
  var valMsg = {};
  function msgModal(messageObj) {
    $(".main").append("<div class='msg-modal'></div>");
  }
  function showErrors(messageObj) {
    $("#upload-recipe").append("<div class='err-msg'><h3>Form has Errors!</h3></div>")
    for (item in messageObj) {
      if (messageObj[item] != "") {
        $(".err-msg").append(
          `<p class='form-err-msg'>${messageObj[item]}</p>`
        );
      }
      // console.log(`${item} : ${messageObj[item]}`);
    }
  }
  function isValidForm(type, formVal) {
    testResult = true;
    if (type == "title") {
      // check to see if there are digits in title
      hasNumbers = /\d/.test(formVal);
      if (!hasNumbers) valMsg[type] = "";
      else {
        valMsg[type] = "Your title should not contain numbers";
        return (testResult = false);
      }
    } else if (type == "image") {
      //checks to see if url link has valid extension
      // doesn't have '//' inbetween link and starts with word characters
      isValidLink = /^\w+(\/[^\/])*[\w\-]*.((jpg)|(png)|(gif)|(jpeg))$/.test(
        formVal
      );
      if (isValidLink) valMsg[type] = "";
      else {
        valMsg[type] = "Image link is invalid";
        return (testResult = false);
      }
    } else if ((type == "prepTime") | (type == "cookTime")) {
      isValidLength = /\d{1,4}/.test(formVal);
      if (isValidLength) valMsg[type] = "";
      else {
        valMsg[type] = "Invalid Number";
        return (testResult = false);
      }
    } else if (type == "cusine") {
      if ((formVal == "") | (formVal == undefined)) {
        valMsg[type] = "Please select a cusine";
        return (testResult = false);
      } else {
        cusine_types = [
          "Vietnamese",
          "Chinese",
          "Japanese",
          "Indian",
          "Western",
          "Korean",
          "Greek",
          "Mexican",
          "Middle Eastern",
          "Other",
        ];
        valMsg[type] = "Invalid cusine choice";
        cusine_types.forEach((choice) => {
          if (choice == formVal) valMsg[type] = "";
        });
      }
    } else if (type == "meal") {
      if ((formVal == "") | (formVal == undefined)) {
        valMsg[type] = "Please select a meal type";
        return (testResult = false);
      } else {
        chosenTypes = formVal.split(",");
        chosenTypes.forEach((item) => {
          switch (item) {
            case "Breakfast":
            case "Brunch":
            case "Lunch":
            case "Dinner":
            case "Dessert":
            case "Appetizers":
            case "Snack":
              valMsg[type] = "";
              break;
            default:
              valMsg[type] = `Invalid meal type: ${item}, from ${formVal}`;
              return (testResult = false);
          }
        });
      }
    } else if (type == "restrictions") {
      if ((formVal == "") | (formVal == undefined)) {
        valMsg[type] = "Please select a valid type";
        return (testResult = false);
      } else {
        switch (formVal) {
          case "Vegan":
          case "Vegetarian":
          case "Halal":
          case "Kosher":
          case "None":
            valMsg[type] = "";
            break;
          default:
            valMsg[type] = `Invalid restriction type: ${formVal}`;
        }
      }
    } else if (type == "ingredients") {
      isCSV = /^([^\,].*\,).*\,?/.test(formVal);
      if (isCSV) valMsg[type] = "";
      else {
        valMsg[type] = "please use commas to separate ingredients";
        return (testResult = false);
      }
    } else if (type == "steps") {
      isNewLineList = /^(.*\n)+/.test(formVal);
      if (isNewLineList) valMsg[type] = "";
      else {
        valMsg[type] =
          "please enter more steps or use a new line for each step";
        return (testResult = false);
      }
    }
    return testResult;
  }
  //submit form handling
  $("#upload-recipe").on("submit", function (e) {
    e.preventDefault();
    //  Form data from input
    var title_str = $("#title").val().trim();
    var image_str = $("#image").val().trim();
    var prep_int = $("#prepTime").val().trim();
    var cook_int = $("#cookTime").val().trim();
    var cusine_enm = $("#cusine").val();
    var meal_set = $("#meal").val().toString();
    var restr_enm = $("#restrictions").val();
    var ingr_arr = $("#ingredients").val();
    var step_arr = $("#steps").val();

    // Form object
    var recipe_data = {
      title: title_str,
      image: image_str,
      prepTime: prep_int,
      cookTime: cook_int,
      cusine: cusine_enm,
      meal: meal_set,
      restrictions: restr_enm,
      ingredients: ingr_arr,
      steps: step_arr,
    };

    // loops through object, and validates each value by KVP
    testResultObject = {};
    for ([key, val] of Object.entries(recipe_data)) {
      testResultObject[key] = isValidForm(key, val);
    }
    console.log(testResultObject);
    testValidity = false;
    for (result in testResultObject) {
      if (!testResultObject[result]) {
        testValidity = false;
        break;
      } else {
        testValidity = true;
      }
    }
    
    // testValidity = true;
    console.log(testValidity);
    if (testValidity == false) {
      showErrors(valMsg);
    } else {
      step_arr = step_arr.split("\n").map((item) => {
        item = item.trim();
        return item;
      });
      recipe_data["steps"] = JSON.stringify(step_arr);

      ingr_arr = ingr_arr.split(",").map((item) => {
        item = item.trim();
        return item;
      });
      recipe_data["ingredients"] = JSON.stringify(ingr_arr);

      // POST to php
      $.post("index.php", recipe_data)
        .done(function (data) {
          console.log("successfully posted to server");
          console.log(data);
        })
        .fail(function (error) {
          console.error(error, "post error");
        });
    }
  });
});
