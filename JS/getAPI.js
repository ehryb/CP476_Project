

        /*************
        SAMPLE URLS

        1. To get the config data like image base urls
        https://api.themoviedb.org/3/configuration?api_key=<APIKEY>

        2. To fetch a list of movies based on a keyword
        https://api.themoviedb.org/3/search/movie?api_key=<APIKEY>&query=<keyword>

        3. To fetch more details about a movie
        https://api.themoviedb.org/3/movie/<movie-id>?api_key=<APIKEY>
        *************/
        //const APIKEY is inside key.js
        var baseURL = 'https://api.themoviedb.org/3/';


        var getList = function (keyword) {
            var url = ''.concat(baseURL, 'movie/popular?api_key=4cde683bbeb5c56aaf2de1fe4d815ffe&language=en-US&page=1');
            fetch(url)
            .then(result=>result.json())
            .then((data)=>{
                //process the returned data
                //var movie_list = JSON.stringify(data, null, 4);
                var results = data["results"];
                element = document.getElementById("search_movies");
                for(var i=0;i<=results.length;i++){
                    var movie = results[i];
                    var id = movie["id"];
                    var title = movie["title"];
                    var option = document.createElement("option");
                    option.text = title;
                    option.value = id;
                    element.add(option);


                }


            })
        }

        var runSearch = function (keyword) {
            let url = ''.concat(baseURL, 'movie/', keyword ,'?api_key=4cde683bbeb5c56aaf2de1fe4d815ffe');
            fetch(url)
            .then(result=>result.json())
            .then((data)=>{
                //process the returned data
                var id = data["id"];
                var title = data["title"];
                var date = data["release_date"];
                var overview = data["overview"];
                var poster_path = data["poster_path"];
                var vote_average = data["vote_average"];
                document.getElementById('movie_title').innerHTML = title;
                document.getElementById('overview').innerHTML = overview;
                document.getElementById("movie_poster").src = "https://image.tmdb.org/t/p/w342"+poster_path+"";
                document.getElementById('critic_score').innerHTML = vote_average;
                document.getElementById("date_released").innerHTML = date;

                getCredit(id)
                //work with results array...

            })
        }

        var getCredit = function(keyword) {
            let url = ''.concat(baseURL, 'movie/', keyword ,'/credits?api_key=4cde683bbeb5c56aaf2de1fe4d815ffe');
            fetch(url)
            .then(result=>result.json())
            .then((data)=>{
                var cast = data["cast"];
                var crew = data["crew"];
                var cast_names = ""
                for (var x = 0;x<=4;x++){
                    var new_cast = cast[x];
                    cast_names += new_cast["name"] + ", "
                }
                var director = crew.find(item=>item.job=="Director");
                var director_name = director["name"];

                document.getElementById('director').innerHTML = director_name;
                document.getElementById("cast").innerHTML = cast_names;

            })
        }




