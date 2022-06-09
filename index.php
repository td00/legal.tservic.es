<?php
$die_lang='<a href="'.$_SERVER["REQUEST_URI"].'?lang=de">Deutsch</a><br><a href="'.$_SERVER["REQUEST_URI"].'?lang=en">English</a>';
if(isset($_GET['lang'])) { //checks if "?lang=" is set in the url
    $site_lang = $_GET['lang']; //setting the language
} else { //if there isn't anything in the header, just die already!
    die(echo $die_lang); 
}
if(isset($_GET['type'])) { //checks if "?type=" is set in the url
    $site_type = $_GET['type']; //setting the type
} else { //if there isn't anything in the header, just die already!
    die("<pre>No type selected. abort!</pre>");
}
if(isset($_GET['page'])) { //checks if "?page=" is set in the url
    $site_name = $_GET['page']; //setting the page
} else { //if there isn't anything in the header, just die already!
    die("<pre>No page selected. abort!</pre>");
}
if($site_type == "privacy") {
    $site_type_long = "Privacy policy / Datenschutzerkl&auml;rung";
} elseif($site_type == "imprint") {
    $site_type_long = "Legal Notice / Imprint / Impressum";
} elseif($site_type == "terms") {
    $site_type_long = "Terms of Use / Nutzungsbedingungen";
} else {
    die("<pre>No valid type. abort!</pre>");
}
if($site_lang == "de") {
    $site_lang_long = "Deutsch";
} elseif($site_lang == "en") {
    $site_lang_long = "English";
} else {
    die("<pre>No valid language. abort!</pre>");
}
$site_title = $site_name." - ".$site_type_long." - ".$site_lang_long; //setting the title;
$site_url = $site_name."/".$site_type."/".$site_lang.".html"; //setting the url;


?>
<html>
<head>
    <title><?php echo $site_title; ?></title>
    <link rel="stylesheet" href="res/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
<?php include $site_url; ?>
<script src="res/js/bootstrap.min.js"></script>
</body>
</html>
