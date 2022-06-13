<html>
<head>
    <link rel="stylesheet" href="res/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
<?php
if(isset($_GET['page'])) { //checks if "?page=" is set in the url
    $site_name = $_GET['page']; //putting it in a more memorable variable
} else { //if there isn't any page selected, thats considered below the bare minimum and we just die..
    die('<pre>No page selected. go to default!</pre><meta http-equiv="refresh" content="0; URL=/?page=thiesmueller.de">');
}
$site_title = $site_name; //setting the title;
if(isset($_GET['type'])) { //checks if "?type=" is set in the url
    $site_type = $_GET['type']; //putting it in a more memorable variable
} else { //if there is no type selector present just present this simple page with the type selector!
    ?>
    <head><title><?php echo $site_title; ?></title></head>
    <a>Do you want to see the Privacy policy or Imprint / Legal Notice for <b><?php echo $site_name ?></b>?</a>
    <br>
    <a>M&ouml;chtest du die Datenschutzerkl&auml;rung oder das Impressum für <b><?php echo $site_name ?></b> sehen?</a>
    <br>
    <?php echo '<a href="'.$_SERVER["REQUEST_URI"].'&type=imprint">Legal Notice / Imprint / Impressum</a><br><a href="'.$_SERVER["REQUEST_URI"].'&type=privacy">Privacy policy / Datenschutzerkl&auml;rung</a><br>';
    $tosexists = $site_name."/terms/valid"; //generate a variable we can check with file_exists below
    if (file_exists($tosexists)) //checks if the file exists
    {
        echo '<a href="'.$_SERVER["REQUEST_URI"].'&type=terms">AGB / Terms of Services</a><hr>';
    } else {
        echo '<hr>';
    }
    die(); //die afterwards to not print something we dont want printed.
}
//this following part generates longer names for the short "types"
if($site_type == "privacy") {
    $site_type_long = "Privacy policy / Datenschutzerkl&auml;rung";
} elseif($site_type == "imprint") {
    $site_type_long = "Legal Notice / Imprint / Impressum";
} elseif($site_type == "terms") {
    $site_type_long = "Terms of Use / Nutzungsbedingungen";
} else {
    die("<pre>No valid type. abort!</pre>"); //if its not a valid type, we don't want it!
}
$site_title = $site_name." - ".$site_type_long; //setting the title;
if(isset($_GET['lang'])) { //checks if "?lang=" is set in the url
    $site_lang = $_GET['lang']; //putting it in a more memorable variable
  } else { //if there is no language selector present just present this simple page with the language selector!
      ?>
      <head><title><?php echo $site_title; ?></title></head>
      <a>Please choose a language to see the <i><?php echo $site_type_long; ?></i> for <b><?php echo $site_name ?></b>.</a>
      <br>
      <a>Bitte w&auml;hle eine Sprache, um die <i><?php echo $site_type_long; ?></i> f&uuml;r <b><?php echo $site_name ?></b> zu sehen.</a>
      <br>
      <?php echo '<a href="'.$_SERVER["REQUEST_URI"].'&lang=de">Deutsch</a><br><a href="'.$_SERVER["REQUEST_URI"].'&lang=en">English</a>';?>
      <?php
      die(); //its time to die again to not print something we dont want printed.
}
//this following part generates longer names for the short language codes, maybe later on I'll use this bit also for injection for language tags to help screen readers...
if($site_lang == "de") {
    $site_lang_long = "Deutsch";
} elseif($site_lang == "en") {
    $site_lang_long = "English";
} else {
    die("<pre>No valid language. abort!</pre>");  // again, if it's not a valid language, we don't want it!
}
$site_title = $site_name." - ".$site_type_long." - ".$site_lang_long; //setting the title;
$site_name_check = $site_name."/valid"; //generate a variable we can check with file_exists below
if (file_exists($site_name_check)) //checks if the file exists
{
    $site_title = $site_name." - ".$site_type_long." - ".$site_lang_long; //setting the title;
    $site_url = $site_name."/".$site_type."/".$site_lang.".html"; //setting the url;
} else {
    die ("invalid site name"); //if the file doesn't exist we can assume, that it's not a valid url, so we die here.
}

if (file_exists($site_url)) // double check if the content requested exists;
{
    include $site_url; // if it does: print it!
}
else 
{
    die("The site you're trying to open is invalid. / Die Seite, die Sie versuchen zu &ouml;ffnen, ist ung&uuml;ltig."); // if not, die.
}



?>
<script src="res/js/bootstrap.min.js"></script>
</body>
<head><title><?php echo $site_title; ?></title></head>
</html>
