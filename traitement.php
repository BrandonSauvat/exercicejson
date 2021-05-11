

<?php


include 'connectionbdd.php';


$menu = isset($_POST['menu']) ? $_POST['menu'] :  NULL;
$sauce = isset($_POST['sauce']) ? $_POST['sauce'] :  NULL;
$sanstomate = isset($_POST['sanstomate']) ? $_POST['sanstomate'] :  NULL;
$sansoignon = isset($_POST['sansoignon']) ? $_POST['sansoignon'] :  NULL;
$sansfromage = isset($_POST['sansfromage']) ? $_POST['sansfromage'] :  NULL;
$sanssalade = isset($_POST['sanssalade']) ? $_POST['sanssalade'] :  NULL;
$supplement = isset($_POST['supplement']) ? $_POST['supplement'] :  NULL;
$supplement2 = isset($_POST['supplement2']) ? $_POST['supplement2'] :  NULL;
$supplement3 = isset($_POST['supplement3']) ? $_POST['supplement3'] :  NULL;
$supplement4 = isset($_POST['supplement4']) ? $_POST['supplement4'] :  NULL;
$boisson = isset($_POST['boisson']) ? $_POST['boisson'] :  NULL;


$tableau = array('menu' => $menu, 'sauce' => $sauce, 'sanstomate' =>$sanstomate, 'sansoignon' => $sansoignon, 'sansfromage' => $sansfromage, 
'sanssalade' => $sanssalade, 'supplement' => $supplement, 'supplement2' => $supplement2, 'supplement3' => $supplement3, 'supplement4' => $supplement4,
'boisson' => $boisson);
$result = json_encode($tableau);


$requete = $conn->prepare("INSERT INTO commande (info_commande) VALUES (:result) ");
$requete->execute(array(':result' => $result ));

header("location:index.php");
?>