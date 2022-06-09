<?php
if(isset($_GET['lang'])) { //checks if "?lang=" is set in the url
    $site_lang = $_GET['lang']; //setting the language
} else { //if there isn't anything in the header, just die already!
    die("<pre>No language selected. abort!</pre>"); 
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
$site_title = $site_name + " - " + $site_type + " - " + $site_lang; //setting the title;
$site_url = $site_name + "/" + $site_type + "/" + $site_lang + ".html"; //setting the url;


?>
<html>
<head>
    <title><?php echo $site_title; ?></title>
    <link rel="stylesheet" href="res/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
<?php echo $site_title; ?>
<?php echo $site_url; ?>
<?php include $site_url; ?>
<script src="res/js/bootstrap.min.js"></script>
</body>
</html>
