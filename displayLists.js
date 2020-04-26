var xmlhttp_art = new XMLHttpRequest();
var xmlhttp_restaurant = new XMLHttpRequest();
var xmlhttp_tech = new XMLHttpRequest();

xmlhttp_art.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var art = JSON.parse(this.responseText);
    var a = document.getElementById("search_art");

    for (var key in art) {
        if (art.hasOwnProperty(key)) {
            var option = document.createElement("option");
            option.value = art[key].art_id;
            option.text = art[key].art_name;
            a.add(option);
        }
      }
  }
};
xmlhttp_art.open("GET", "getArtList.php", true);
xmlhttp_art.send();

xmlhttp_restaurant.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var rest = JSON.parse(this.responseText);
    var r = document.getElementById("search_restaurants");

    for (var key in rest) {
        if (rest.hasOwnProperty(key)) {
            var option = document.createElement("option");
            option.value = rest[key].restaurant_id;
            option.text = rest[key].restaurant_name;
            r.add(option);
        }
      }
  }
};
xmlhttp_restaurant.open("GET", "getRestaurantList.php", true);
xmlhttp_restaurant.send();

xmlhttp_tech.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var tech = JSON.parse(this.responseText);
    var t = document.getElementById("search_tech");

    for (var key in tech) {
        if (tech.hasOwnProperty(key)) {
            var option = document.createElement("option");
            option.value = tech[key].tech_id;
            option.text = tech[key].tech_name;
            t.add(option);
        }
      }
  }
};
xmlhttp_tech.open("GET", "getTechList.php", true);
xmlhttp_tech.send();
