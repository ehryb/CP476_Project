<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="project_css.css" rel="stylesheet">

</head>
<body>



<div class="container-fluid pt-3 h-100">
    <nav class="navbar navbar-dark bg-dark">
    <img id = "mainLogo" src = "Images/Logo.png" alt="Logo" height = "50em">
    <div class="d-flex justify-content-end">
        <a class="pr-3"href="mainpage.php">Log Out</a>
        <a class="pr-3" href="aboutuspage.php">About Us</a>
        <a class="pr-3" href="myaccountpage.php">My Account</a>
        <a href="homepage.php">Home</a>
        <input id="search_input" type="text" name="first_name" placeholder="Search Art..."/>
    </div>

</nav>

    <div class="title">
        <h1>Art Reviews</h1>
        <img id = "title_image" src = "Images/paintbrush.png" alt="Logo" height = "90em">
    </div>



    <article>
        <div class="main-contents">
            <div class="clearfix">
                <img class="img-fluid float-left pull-left mr-5" style="max-width: 30em; max-height: 60em;" src="images/Mona_Lisa.jpg" alt="Italian Trulli">
                <p id = "movie_title">Art Work Name Here</p>
                <table>
                    <tr>
                        <th>
                            <h3 id="scores">Audience Score</h3>
                        </th>
                        <th>
                            <h3 id ="scores">Critics Score</h3>
                        </th>
                    </tr>
                    <tr>
                        <th>Score</th>
                        <th>Score</th>
                    </tr>
                </table>

                <h4 class="pt-4">Overview</h4>
                <div class="different-lines"></div>
                <p>This part will contain a description of the art work. It will not be more than 4 to 5 sentences and will give the user a small overview of the history of the art, the type, the genre, etc.
                </p>

                <div class="card border border-0">
                    <ul class="list-group list-group-flush border border-0">
                         <li class="list-group-item row d-flex border border-0 pl-0">
                            <div class="col-4" style="color:orange; font-size: 18px;">Year Created: </div>
                            <div class="col-8">Year</div>
                        </li>
                        <li class="list-group-item row d-flex border border-0 pl-0">
                            <div class="col-4" style="color:orange; font-size: 18px;">Artist: </div>
                            <div class="col-8">Artist(s)</div>
                        </li>
                         <li class="list-group-item row d-flex border border-0 pl-0">
                            <div class="col-4" style="color:orange; font-size: 18px;">Medium: </div>
                            <div class="col-8">Medium</div>
                        </li>
                         <li class="list-group-item row d-flex border border-0 pl-0">
                            <div class="col-4" style="color:orange; font-size: 18px;">Subject: </div>
                            <div class="col-8">Subject(s)</div>
                        </li>

                    </ul>
                </div>
            </div>
            </div>

        <div class="different-lines">
            <div class = "new-lines">

            </div>
        </div>




        <div id = "container2">
        <div class = "new-lines">





        <div id = "ReviewBox">
            <table id = "critic_table">
                <tr>
                    <th><h4>Critic Reviews</h4></th>
                </tr>

                <tr>
                    <td> LA Times: One of the greatest pieces in history </td>
                </tr>
                <tr>
                    <td> New York Times: They don't call it Mona Lisa Smile for nothing</td>
                </tr>


            </table>

            <table id = "audience_table">

                <tr>
                    <th><h4>Audience Review</h4></th>
                </tr>

                <tr>
                    <td> User 1: Beautiful piece to own in your home </td>
                </tr>


                <tr>
                    <td> User 2: Truly stunning, will continue to shine throughout the rest of time</td>
                </tr>
            </table>


        </div>

        </div>



        </div>

        <div id = "container3">
            <div class = "new-lines">

                <div class="pt-3 pl-5">
                    <h3>Add Review </h3>

                    <textarea id="review_area" rows="4" cols="60" placeholder="Add Your Review Here"></textarea>
                    <h3></h3>
                    <button type="submit" id = "submitReview" value="reviewSubmit">
                        Submit Review!
                    </button>

                </div>

            </div>



        </div>


    </article>




</div>

    </body>
</html>
