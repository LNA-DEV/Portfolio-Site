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
    <title>LNA-DEV ~ Lukas Nagel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="<?php echo $icon ?>">
    <link rel="apple-touch-icon" href="<?php echo $icon ?>" />
    <link rel="stylesheet" href="../DarkMode/dark-mode.css">
    <link rel="stylesheet" type="text/css" href="./Styles/privacyTools.css" media="screen" />
</head>

<body>

    <form action="./Backend/Upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="text" name="Format" placeholder="Format">
    <input type="text" name="GridColumn" placeholder="GridColumn">
    <input type="text" name="Notes" placeholder="Notes">
    <input type="text" name="Rating" placeholder="Rating">
    <input type="text" name="PostedOnInstagram" placeholder="PostedOnInstagram">
    <input type="text" name="bearer" placeholder="bearer">
    <input type="text" name="TakenWith" placeholder="TakenWith">
    <input type="submit" value="Upload Image" name="submit">
    </form>

    <?php

    include "../Backend/Analytics.php";

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="../DarkMode/dark-mode-switch.js"></script>
</body>

</html>