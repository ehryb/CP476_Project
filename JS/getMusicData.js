function getJSURL(stringValue,rank){
    var res = stringValue.split("/music/");
    var newStr = res[1];

    var secondHalf = newStr.split("/_/");
    var artist = secondHalf[0].toLowerCase();
    var track = secondHalf[1].toLowerCase();
    jsString  = "method=track.getInfo&api_key=77780cb836c3d56b9f1f794ce2a4b512&artist="
    finalString = jsString.concat(artist, "&track=",track, "&format=json","/",rank);
    return finalString;
    //eminem&track=cold+wind+blows&format=json"
}

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
        //var baseURL = 'https://api.themoviedb.org/3/';
        var baseURL = 'https://ws.audioscrobbler.com/2.0/?';
//"method=geo.gettoptracks&country=canada&api_key=77780cb836c3d56b9f1f794ce2a4b512&format=json"


        var getList = function (keyword) {
            var url = ''.concat(baseURL, 'method=geo.gettoptracks&country=canada&api_key=77780cb836c3d56b9f1f794ce2a4b512&format=json');
            fetch(url)
            .then(result=>result.json())
            .then((data)=>{
                //process the returned data
                //var movie_list = JSON.stringify(data, null, 4);
                topTrack = data.tracks.track;

                element = document.getElementById("search_music");
                for(var i=0;i<=topTrack.length;i++){
                    var track = topTrack[i];
                    name = track.name;
                    rank = track["@attr"].rank;
                    var trackURL = track.url;


                    var option = document.createElement("option");
                    option.text = name;
                    option.value = getJSURL(trackURL,rank);
                    element.add(option);
                }


            })
        }

        var runSearch = function (keyword) {
            rank_list = keyword.split("/");
            //rank = rank_list[1];
            rank = parseInt(rank_list[1]);
            rank = rank + 1;
            rank_value = rank.toString();

            url_method = rank_list[0];

            let url = ''.concat(baseURL, url_method);
            fetch(url)
            .then(result=>result.json())
            .then((data)=>{




                var image_src = data.track.album.image[3]["#text"];
                var artist = data.track.album.artist;
                var album_title = data.track.album.title;
                var album_url = data.track.album.url;

                var split_album = album_url.split("/");
                var album_item = split_album.pop();

                var artist_url = data.track.artist.url;
                var split_artist = artist_url.split("/");
                var artist_item = split_artist.pop();


                var track_name = data.track.name;
                var summary = data.track.wiki.summary;
                var overview = data.track.wiki.content;

                document.getElementById('page_title').innerHTML = track_name;
                document.getElementById('lastFMrank').innerHTML = rank_value;

                document.getElementById('track_overview').innerHTML = summary;
                document.getElementById("music_poster").src =  image_src;
                document.getElementById("album_name").innerHTML = album_title;
                document.getElementById("album_name").setAttribute('href', album_url);

                document.getElementById("artist_names").innerHTML = artist;

                //var get_item(artist_url, album_url)
                var new_url = "method=album.getInfo&api_key=77780cb836c3d56b9f1f794ce2a4b512&artist=".concat(artist_item, "&album=", album_item, "&format=json")
                //getYear(new_url);
                yearArray = overview.match(/[1-2][0-9][0-9][0-9]/g);
                if (yearArray != null){
                    document.getElementById("music_year").innerHTML = yearArray[0];
                }
                else{
                    document.getElementById("music_year").innerHTML = "N/A";

                }





            })
        }

        var getYear = function(keyword) {
            let url = ''.concat(baseURL, keyword);
            fetch(url)
            .then(result=>result.json())
            .then((data)=>{

                new_data = data;


                //document.getElementById('director').innerHTML = director_name;
                //document.getElementById("cast").innerHTML = cast_names;

            })
        }




    //    $curl = curl_init("http://ws.audioscrobbler.com/2.0/?method=album.getInfo&api_key=77780cb836c3d56b9f1f794ce2a4b512&artist=eminem&album=recovery&format=json");



