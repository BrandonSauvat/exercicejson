<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php include 'connectionbdd.php';
    $requete = $conn->prepare("SELECT info_commande FROM commande ORDER BY id_commande DESC");
                     $requete->execute();
                     $var = $requete->fetch();
                    
                     $result = json_decode($var['info_commande']);
                     
                     
                     ?>

           
    
<h1> Formulaire de Commande</h1>

<form method="POST" action="traitement.php">
<div class="formulaire">

<div class="column">
    <SELECT name="menu" size="1">
            <option value=""> Choissisez un Menu </option> 
            <option value="Bigmac">BigMac </option> 
            <option value="MacFish">MacFish </option> 
            <option value="MacChicken">MacChicken </option> 
           
    </SELECT>


    <SELECT name="sauce" size="1">
            <option value=""> Choissisez une sauce</option> 
            <option value="mayo">mayo </option> 
            <option value="ketchup">ketchup</option> 
            <option value="moutarde">moutarde </option> 
            
    </SELECT>

    <SELECT name="boisson" size="1">
            <option value=""> Choissisez une Boisson </option> 
            <option value="Coca-Cola.">Coca-Cola </option> 
            <option value="Ice-Tea.">Ice-Tea</option> 
            <option value="Pastis.">Pastis</option> 
            <option value="Orangina.">Orangina </option> 
            
    </SELECT>
</div>
<div class="column" style="margin-left: 2rem;">
    <span><input type="checkbox" name="sanstomate" value="sans tomate,"/> Sans tomate</span>
    <span><input type="checkbox" name="sansoignon" value="sans oignon,"/> Sans oignon</span>
    <span><input type="checkbox" name="sanssalade" value="sans salade,"/> Sans salade</span>
    <span><input type="checkbox" name="sansfromage" value="sans fromage,"/> Sans fromage</span>
</div>

<div class="column">
    <SELECT name="supplement" size="1">
            <option value=""> Supplement 1 </option> 
            <option value="salade,">salade </option> 
            <option value="tomate,">tomate</option> 
            <option value="oignon,">Oignon </option> 
            <option value="fromage,">Fromage</option> 
            
    </SELECT>

    <SELECT name="supplement2" size="1">
            <option value=""> Supplement 2 </option> 
            <option value="salade,">salade </option> 
            <option value="tomate,">tomate</option> 
            <option value="oignon,">Oignon </option> 
            <option value="fromage,">Fromage</option> 
            
    </SELECT>

    <SELECT name="supplement3" size="1">
            <option value=""> Supplement 3 </option> 
            <option value="salade,">salade </option> 
            <option value="tomate,">tomate</option> 
            <option value="oignon,">Oignon </option> 
            <option value="fromage,">Fromage</option> 
            
    </SELECT>

    <SELECT name="supplement4" size="1">
            <option value=""> supplement 4</option> 
            <option value="salade,">salade </option> 
            <option value="tomate,">tomate</option> 
            <option value="oignon,">Oignon </option> 
            <option value="fromage,">Fromage</option> 
            
    </SELECT>
</div>

    

    
</div>
<input style="margin-left:46.5%;" type="submit" value="Envoyer">

    </form>

<?php if ($result -> menu == NULL)
        {
            echo" Veuillez choisir un menu" ;
        }else{
?>
            <p style="font-size: 1.3rem; margin-left: 5rem;" >Récapitulatif de votre commande: </p>
            <p>Menu: <?php  
                    echo $result -> menu;
                    echo ", ";
                    echo " " ;
                    


                       if ($result->sauce == NULL){
                         echo "sans sauce,";
                     }else
                     {
                         echo "Sauce: ";
                     echo $result -> sauce;
                    }
                     
                      ?> 
                        <?php  
                        
                        echo $result -> sanstomate." ";
                        echo $result -> sanssalade." ";
                        echo $result -> sansoignon." ";
                        echo $result -> sansfromage." ";



                        if ($result->supplement == NULL AND $result->supplement2 == NULL AND $result->supplement3 == NULL AND $result->supplement4 == NULL ){
                            echo "sans supplement";
                        }else{
                            
                            echo "supplement: ";
                     echo $result -> supplement." ";
                     echo $result -> supplement2." ";
                     echo $result -> supplement3." ";
                     echo $result -> supplement4." ";
                            
                        }
                        
                        if ($result -> boisson == NULL){
                            echo "sans boisson.";
                        }
                        else{
                            echo ", boisson: ";
                            echo $result -> boisson;
                        }



        }
                     ?>

            
            

            </body>
</html>