<?php

    $url="https://api.lna-dev.net/PersonalWebsite/Metadata";

    $data = file_get_contents($url, true);

    $json = json_decode($data, true);
    
    foreach($json as $key => $value) {
        if ($value["name"] == "Icon")
        {
            $icon = $value["value"];
        }
        else if($value["name"] == "HomeDescription")
        {
            $homeDescription = $value["value"];
        }
    }
    
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8">
    <meta name="description" content="<?php echo $homeDescription ?>" />
    <title>LNA-DEV ~ Lukas Nagel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Styles/index.css" media="screen" />
    <link rel="icon" type="image/x-icon" href="<?php echo $icon ?>">
    <link rel="apple-touch-icon" href="<?php echo $icon ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="Scripts/index.js"></script>
</head>

<body>

    <div class="position-absolute end-0 top-0" id="top"></div>

    <div class="container-fluent">

        <div class="chapter">
            <div class="row">
                <h1 class="heading">About</h1>
            </div>

            <div class="row">
                <p class="subHeading">
                    Hello World!<br>
                    I am Lukas Nagel a Software-Developer from Bavaria Germany.
                </p>
            </div>

            <div class="row">
                <button class="smallButton" onclick="ScrollToMiddle()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-arrow-down-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z" />
                    </svg>
                </button>
            </div>
        </div>




        <div class="chapter" id="middle">
            <div class="row">
                <button class="smallButton" onclick="ScrollToTop()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-arrow-up-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z" />
                    </svg>
                </button>
            </div>

            <div class="row mb-5">
                <h1 class="heading">My projects</h1>
            </div>


            <?php
                $url="https://api.lna-dev.net/PersonalWebsite/ProjectCards";

                $data = file_get_contents($url, true);
            
                $json = json_decode($data, true);
                
            $cardCounter = 0;
            foreach($json as $key => $row) {
                $Image = $row["linkToImage"];
                $Title = $row["title"];
                $Text = $row["text"];
                $BadgeType = $row["badge"]["type"];
                $BadgeText = $row["badge"]["text"];
                $Link1 = $row["links"][0]["link"];
                $Link1Text = $row["links"][0]["text"];
                $Link1Type = $row["links"][0]["type"];
                if(count($row["links"]) > 1)
                {
                    $Link2 = $row["links"][1]["link"];
                    $Link2Text = $row["links"][1]["text"];
                    $Link2Type = $row["links"][1]["type"];
                }else{
                    $Link2 = "";
                    $Link2Text = "";
                    $Link2Type = "";
                }

                if ($cardCounter == 0) {
                    echo '<div class="row">';
                }

                if ($cardCounter % 3 == 0) {
                    echo '</div>';
                    echo '<div class="row">';
                }

                echo "<div class=\"col-lg mt-2 mb-5\">";
                echo "<div class=\"card mx-auto shadow\" style=\"width: 90%;\">";
                echo "<img src=\"$Image\" class=\"card-img-top\" alt=\"...\">";
                echo "<div class=\"card-body\">";
                echo "<h5 class=\"card-title\">$Title <span class=\"badge rounded-pill $BadgeType\">$BadgeText</span></h5>";
                echo "<p class=\"card-text\">$Text </p>";
                if ($Link1 != "") {
                    echo "  <a href=\"$Link1\" class=\"btn-lg $Link1Type  text-decoration-none\">$Link1Text</a>";
                }
                if ($Link2 != null && $Link2 != "") {
                    echo "  <a href=\"$Link2\" class=\"btn-lg $Link2Type text-decoration-none\">$Link2Text</a>";
                }
                echo "</div>";
                echo "</div>";
                echo "</div>";

                $cardCounter++;
            }
            echo '</div>';

            ?>


            <div class="row">
                <button class="smallButton" onclick="ScrollToBottom()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-arrow-down-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z" />
                    </svg>
                </button>
            </div>
        </div>




        <div class="chapter" id="bottom" style="margin-bottom: 35vh;">
            <div class="row">
                <button class="smallButton" onclick="ScrollToMiddle()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-arrow-up-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z" />
                    </svg>
                </button>
            </div>

            <div class="row">
                <h1 class="heading">Get in touch with me</h1>
            </div>

            <div class="row my-3">

                <div class="col">
                    <div class="iconRow">
                        <button onclick="SendEmail()" type="button" class="btn btn-dark icon mx-3"><i class="fa fa-envelope"></i></button>
                        <a href="https://github.com/LNA-DEV" class="btn btn-dark icon mx-3"><i class="fa fa-github"></i></a>
                        <a href="https://mastodon.online/@lna_dev" class="btn btn-dark icon mx-3"><i class="fa fa-mastodon"></i></a>
                        <a href="https://www.youtube.com/channel/UCe4IFwlwejzqa0qLfLPGbPg" class="btn btn-dark icon mx-3"><i class="fa fa-youtube"></i></a>
                    </div>

                </div>

            </div>

        </div>

    </div>




    <?php

    include "Backend/Analytics.php";

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>