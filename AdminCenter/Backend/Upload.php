<?php
$target_dir = $_SERVER['DOCUMENT_ROOT']."/Assets/Photo/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

$noExifTargetFile = substr($target_file, 0, strlen($target_file) - 4) . '_noexif.jpg';

removeExif($target_file, $noExifTargetFile);

$compressionTargetFileWebp = substr($noExifTargetFile, 0, strlen($target_file) - 4) . '_compression.webp';

jpg2webp($noExifTargetFile, $compressionTargetFileWebp, 25);

changeSize($compressionTargetFileWebp, 1000);

function changeSize($pic, $size)
{
  $image = imagecreatefromwebp($pic);
  $scaledImage = imagescale($image, $size);
  $destinationFile = substr($pic, 0, strlen($pic) - 17) . '-Prev.webp';
  imagewebp($scaledImage, $destinationFile);
  return $destinationFile;
}

function jpg2webp($source_file, $destination_file, $compression_quality = 100)
{
    $image = imagecreatefromjpeg($source_file);
    imagewebp($image, $destination_file, $compression_quality);
    return $destination_file;
}

function removeExif($old, $new)
{
    // Open the input file for binary reading
    $f1 = fopen($old, 'rb');
    // Open the output file for binary writing
    $f2 = fopen($new, 'wb');

    // Find EXIF marker
    while (($s = fread($f1, 2))) {
        $word = unpack('ni', $s)['i'];
        if ($word == 0xFFE1) {
            // Read length (includes the word used for the length)
            $s = fread($f1, 2);
            $len = unpack('ni', $s)['i'];
            // Skip the EXIF info
            fread($f1, $len - 2);
            break;
        } else {
            fwrite($f2, $s, 2);
        }
    }

    // Write the rest of the file
    while (($s = fread($f1, 4096))) {
        fwrite($f2, $s, strlen($s));
    }

    fclose($f1);
    fclose($f2);
}

unlink($target_file);
unlink($compressionTargetFileWebp);
rename($noExifTargetFile, $target_file);

$baseName = basename($_FILES["fileToUpload"]["name"]);
$Name = substr($baseName, 0, strlen($baseName) - 4);

$URL = "https://lna-dev.com/Assets/Photo/".$Name."-Prev.webp";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $Format = $_POST['Format'];
  $GridColumn = $_POST['GridColumn'];
  $Notes = $_POST['Notes'];
  $Rating = $_POST['Rating'];
  $PostedOnInstagram = $_POST['PostedOnInstagram'];
  $bearer = $_POST['bearer'];
  $TakenWith = $_POST['TakenWith'];
}

$postUrl = "https://api.lna-dev.net/PersonalWebsite/Photo";

$data = array(
  'name'      => $Name,
  'url'    => $URL,
  'format'       => $Format,
  'gridColumn' => (int) $GridColumn,
  'notes'      => $Notes,
  'rating'      => (int) $Rating,
  'postedOnInstagram' => (bool) $PostedOnInstagram,
  'takenWith' => $TakenWith
);

$options = array(
  'http' => array(
    'method'  => 'POST',
    'content' => json_encode( $data ),
    'header'=>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n" .
                "Authorization: bearer $bearer\r\n"
    )
);

$context  = stream_context_create( $options );
$result = file_get_contents( $postUrl, false, $context );
$response = json_decode( $result );

?>
