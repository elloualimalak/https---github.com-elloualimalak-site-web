<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passer votre commande</title>
    <link rel="stylesheet" href="commande.css">

</head>
<body>
    <form method="post">
        <h1>Passer votre commande</h1>
        <div class="cont">
        <label id="c" for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" >

        <label id="c" for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" >

        <label id="c">Type de Commande :</label>
        <input type="radio" id="livraison" name="type_commande" value="livraison" checked>
        <label for="livraison">Livraison</label>
        <input type="radio" id="patisserie" name="type_commande" value="patisserie">
        <label for="patisserie">Passer à la pâtisserie</label>

        <label id="c" for="categorie">Catégorie :</label>
        <select id="categorie" name="categorie" >
            <option value="gateau" disabled selected>Ajouter votre catégorie</option>
            <option value="gateau">Gâteau</option>
            <option value="tarte">Tarte</option>
            <option value="macaron">Macaron</option>
        </select>

        <label id="c" for="saveur">Saveur :</label>
        <select id="saveur" name="saveur" >
            <option value="gateau" disabled selected>Ajouter votre saveur</option>
            <option value="vanille">Vanille</option>
            <option value="chocolat">Chocolat</option>  
            <option value="chocolat">Citron</option>
            <option value="fraise">Fraise</option>
            <option value="chocolat">Franboise</option>
            <option value="chocolat">Café</option>

        </select>

        <label id="c" for="quantite">Quantité :</label>
        <input type="number" id="quantite" name="quantite" min="1" >
<div>
<button type="submit" onclick="VERIFIER()">Commander</button>

</div>
        </div>
        


    </form>
    <script language="JavaScript">
function VERIFIER(){
    let n=document.getElementById("nom").value;
       if(n=="")       {alert("veuillez saisir votre nom!");
       return false;}
    let p=document.getElementById("prenom").value;
       if(p=="")       {alert("veuillez saisir votre prénom!");
       return false;}
    let t=document.getElementById("categorie").value;
       if(t=="")       {alert("veuillez selectionner une categorie!");
       return false;}
    let e=document.getElementById("saveur").value;
       if(e=="")       {alert("veuillez selectionner une saveur!");
       return false;}
    let a=document.getElementById("c").value;
    if(a=="")       {alert("veuillez saisir la quantité!"); 
       return false;
    }
    alert("Commande reussite!");
}
</script>
<?php
include('fonctions.php');
connexion();
if(isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['type_commande']) and isset($_POST['categorie']) and isset($_POST['saveur']) and isset($_POST['quantite']))
{
    if((!empty($_POST['nom'])) and (!empty($_POST['prenom'])) and (!empty($_POST['type_commande'])) and (!empty($_POST['categorie'])) and (!empty($_POST['saveur'])) and (!empty($_POST['quantite'])))
    { connexion();
     $sql3="insert into commande(nom,prenom,type_commande,categorie,saveur,quantite) values('".$_POST['nom']."','".$_POST['prenom']."','".$_POST['type_commande']."','".$_POST['categorie']."','".$_POST['saveur']."','".$_POST['quantite']."')";
     $bdd->exec($sql3);
        echo "<script>alert(\"commande reussite!\")</script>"; 
    }  else           echo "<script>alert(\"veuillez remplir votre commande !\")</script>"; 

}  


?>
</body>
</html>
