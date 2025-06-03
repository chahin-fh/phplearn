<?php
/*$d = date("Y-m-d");
$y = date("Y" , strtotime($d));
function addyear (& $year){
    $year = $year + 1;
}
addyear($y);*/ //pointeur w fazit
/*
echo $y ;
echo PHP_VERSION;
echo "<br>";
echo PHP_OS_FAMILY;
echo "<br>";
echo PHP_INT_MAX;
echo "<br>";
echo DEFAULT_INCLUDE_PATH;
echo "<br>";
echo __LINE__;
echo "<br>";
echo __DIR__;
echo "<br>";
echo __CLASS__;
echo "<br>";
echo __FUNCTION__;*/ // constente
/*
if (50>80) :
    echo "heloo ";
endif; // il if mo5tassra w 5ir
*/
/*$cnx = mysqli_connect("localhost" , "root" , "" , "chayma");
$all = mysqli_query($cnx , "SELECT * from jour");
$tab = mysqli_fetch_assoc($all);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php while($tab = mysqli_fetch_assoc($all)): ?>
    <?php  foreach($tab as $i => $c) : ?>
        <h1><?php echo $i ; ?></h1>
        <h1><?php echo $c ; ?></h1>
    <?php endforeach ?>
    <?php endwhile ?>
</body>
</html>*/ // fazit mo7assna w t3awin il while w for mnadhma
/*@include("djajas.php");
if(isset($a)):
    echo $a . "<br>";
endif;
echo "hello world";*/ // fazit include kan ma famach il file ili hachtik bih wil isset ista3malha sahil
/*function djaja($kwissah = "chahin" , $fa9oussa = "7mid")
{
    echo "fa9oussa is $fa9oussa";
    echo "<br>";
    echo "kiwassh is $kwissah";
}
djaja(fa9oussa: "koussay");*/ // il parametre il default
/*function djaja(...$malali3b)
{
    foreach ($malali3b as $mala) {
        echo "fuck you $mala <br>";
    }
}
djaja("hmd","koussay","sofein","adem");*/ //kif tabda ma ta3rafch 9adach 3andik mil parametre (parametre == argument)
/*function tellmewhy($ya5ra)
{
    echo "tellmewhy $ya5ra ";
}
$func = "tellmewhy";
if(function_exists($func)):
echo $func("koussay");
else :
    echo " foutouuuuuuu";
endif;*/ //ism fn variable
// function with one use aynonemosse fn
/*
$arr = ['koussay' =>"rob3", 'sofien' => "fassyan" , 'hmd' => "tyz"];
$arr1 = [11,55,66,77,88,55,44];
echo print_r($arr1);
echo print_r($arr);
array_map(function ($name) { echo "yfz ya $name <br>";} , $arr );*/
/*$domain = "chahinfhima";// test for a idea 
$arr = array("@","gmail",".com");
array_unshift($arr , $domain);
echo implode($arr);*/
// underline animated
/*
.nav-links a {
    text-decoration: none;
    color: #fff;
    font-weight: 500;
    position: relative;
    padding-bottom: 5px;
}

.nav-links a::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: 0;
    left: 0;
    background-color: #fff;
    transition: width 0.3s ease;
}

.nav-links a:hover::after {
    width: 100%;
}

// ... existing code ...
 */
//save uploaded img
/*
 * <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("cnx.php");
session_start();

if (!isset($_SESSION['id'])) {
    echo "<script>alert('Erreur : Utilisateur non connecté.'); window.history.back();</script>";
    exit();
}

$user_id = $_SESSION['id'];

// Vérification des champs requis
if (!isset(
    $_POST['recipe-name'],
    $_POST['recipe-ingredients'],
    $_POST['recipe-preparation'],
    $_POST['preparation-time'],
    $_POST['cooking-time'],
    $_POST['servings'],
    $_FILES['recipe-image']
)) {
    echo "<script>alert('Erreur : Tous les champs du formulaire doivent être remplis.'); window.history.back();</script>";
    exit();
}

$recipe_name = $_POST['recipe-name'];
$recipe_ingredients = $_POST['recipe-ingredients'];
$recipe_preparation = $_POST['recipe-preparation'];
$preparation_time = intval($_POST['preparation-time']);
$cooking_time = intval($_POST['cooking-time']);
$servings = intval($_POST['servings']);

// Vérification si la recette existe déjà
$check_stmt = $cnx->prepare("SELECT id FROM recetts WHERE name = ? AND user_id = ?");
$check_stmt->bind_param("si", $recipe_name, $user_id);
$check_stmt->execute();
$check_stmt->store_result();

if ($check_stmt->num_rows > 0) {
    echo "<script>alert('Erreur : Une recette avec ce nom existe déjà dans votre collection.'); window.history.back();</script>";
    $check_stmt->close();
    exit();
}
$check_stmt->close();

// Traitement de l'image
$target_dir = "uploads/";
$unique_filename = uniqid() . '_' . basename($_FILES["recipe-image"]["name"]);
$target_file = $target_dir . $unique_filename;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (!is_dir($target_dir)) {
    if (!mkdir($target_dir, 0755, true)) {
        echo "<script>alert('Erreur : Impossible de créer le dossier uploads.'); window.history.back();</script>";
        exit();
    }
}

if ($_FILES['recipe-image']['error'] !== UPLOAD_ERR_OK) {
    echo "<script>alert('Erreur lors de l\\'upload du fichier : " . $_FILES['recipe-image']['error'] . "'); window.history.back();</script>";
    exit();
}

$allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
if (!in_array($imageFileType, $allowed_types)) {
    echo "<script>alert('Erreur : Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.'); window.history.back();</script>";
    exit();
}

$check = getimagesize($_FILES["recipe-image"]["tmp_name"]);
if ($check === false) {
    echo "<script>alert('Erreur : Le fichier n\\'est pas une image.'); window.history.back();</script>";
    exit();
}

if ($_FILES["recipe-image"]["size"] > 5 * 1024 * 1024) {
    echo "<script>alert('Erreur : Le fichier est trop volumineux. La taille maximale autorisée est de 5 Mo.'); window.history.back();</script>";
    exit();
}

if (move_uploaded_file($_FILES["recipe-image"]["tmp_name"], $target_file)) {
    $stmt = $cnx->prepare("INSERT INTO recetts (name, ingredients, preparation, preparation_time, cooking_time, servings, image_path, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        echo "<script>alert('Erreur de préparation de la requête : " . $cnx->error . "'); window.history.back();</script>";
        exit();
    }

    $stmt->bind_param("sssiiiss", $recipe_name, $recipe_ingredients, $recipe_preparation, $preparation_time, $cooking_time, $servings, $target_file, $user_id);

    if ($stmt->execute()) {
        echo "<script>alert('Recette ajoutée avec succès !'); window.location.href = '../main.php';</script>";
    } else {
        echo "<script>alert('Erreur lors de l\\'ajout de la recette : " . $stmt->error . "'); window.history.back();</script>";
    }
    $stmt->close();
} else {
    echo "<script>alert('Erreur : Impossible de déplacer le fichier uploadé.'); window.history.back();</script>";
    exit();
}

$cnx->close();
?>
 */
//substr w fazit
/*echo substr_replace("dajaj","fa9ouss" , 0 , 3);
echo "</br>";
echo substr("fa9ous djaja" , 0 , 5);*/
//fazit
/*
$arr = ["name" => "chahine" ,"alba9i" =>["fhima","mohamed"]];
echo "<pre>";
print_r($arr);
echo "</pre>";
echo $arr["alba9i"][1];
$test = true;
$ahmad_is_bhim = true;
$prenciple_requist = "SELECT * from test";
if($test = true){
    $final_requist = $prenciple_requist . " where test = 'djaja'";
}
if($ahmad_is_bhim= true){
    $final_requist = $final_requist . ' and name = "hmd"';
}
echo $final_requist;*/
// sort
//natsort($array);
//array map
//array_map('fn' , $array , $oarray);
// arrray filter chouf il zero
//array reduce
/*function mini($item1 ,$item2)
{
    if ($item1>$item2) {
        $item1 = $item2;
    }
    return $item1;
}
$arr = [10,20,30,40,50,60,70,80,90,100];
echo array_reduce($arr , 'mini' , 200);*/
//all fn filter
/*echo '<pre>';
print_r(filter_list());
echo '</pre>';*/
/*raname("filepath","nowloc") ; //yhizlik il file min blassa li blassa */
/*setcoockie(name,value,expired time ,path(mohim yassir il path rw) ) // fazit */
