<html>
<head>
    <title><?php echo $site_title; ?></title>
    <link rel="stylesheet" href="res/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
<?php
if(isset($_GET['page'])) { //checks if "?page=" is set in the url
    $site_name = $_GET['page']; //setting the page
} else { //if there isn't any page selected, thats considered below the bare minimum.
    die("<pre>No page selected. abort!</pre>");
}
if(isset($_GET['type'])) { //checks if "?type=" is set in the url
    $site_type = $_GET['type']; //setting the type
} else { //if there isn't anything in the header, just die already!
    ?>
    <a>Do you want to see the Privacy policy or Imprint / Legal Notice for <?php echo $site_name ?>?</a>
    <br>
    <a>M&ouml;chtest du die Datenschutzerkl&auml;rung oder das Impressum für <?php echo $site_name ?> sehen?</a>
    <br>
    <?php echo '<a href="'.$_SERVER["REQUEST_URI"].'&type=imprint">Legal Notice / Imprint / Impressum</a><br><a href="'.$_SERVER["REQUEST_URI"].'&type=privacy">Privacy policy / Datenschutzerkl&auml;rung</a>';?>
    <?php
    die(); 
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
if(isset($_GET['lang'])) { //checks if "?lang=" is set in the url
    $site_lang = $_GET['lang']; //printing the next hop
  } else { //if there isn't anything in the header, just die already!
      ?>
      <a>Please choose a language to see the </a><?php echo $site_type_long; ?><a> for <?php echo $site_name ?>.</a>
      <br>
      <a>Bitte w&auml;hle eine Sprache, um die </a><?php echo $site_type_long; ?><a> für <?php echo $site_name ?> zu sehen.</a>
      <br>
      <?php echo '<a href="'.$_SERVER["REQUEST_URI"].'&lang=de">Deutsch</a><br><a href="'.$_SERVER["REQUEST_URI"].'&lang=en">English</a>';?>
      <?php
      die(); 
}
if($site_lang == "de") {
    $site_lang_long = "Deutsch";
} elseif($site_lang == "en") {
    $site_lang_long = "English";
} else {
    die("<pre>No valid language. abort!</pre>");
}
$site_name_check = $site_name."/valid";
if (file_exists($site_name_check))
{
    $site_title = $site_name." - ".$site_type_long." - ".$site_lang_long; //setting the title;
    $site_url = $site_name."/".$site_type."/".$site_lang.".html"; //setting the url;
} else {
    die ("invalid site name");
}

if (file_exists($site_url)) 
{
    include $site_url;
}
else 
{
    die("The site you're trying to open is invalid. / Die Seite, die Sie versuchen zu &ouml;ffnen, ist ung&uuml;ltig.");
}



?>
<script src="res/js/bootstrap.min.js"></script>
</body>
</html>
