<html>
<head>
<title>Page protegée par mot de passe : Administrateur</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="c.css"></head>
<body>
    <div class="container">
    <h2>Inscription</h2>
    <form method="post">
	<table>
	<tr><td><input id="n" name="N" type="text" placeholder="Nom" ></td></tr>
    <tr><td><input id="p" name="P" type="text" placeholder="Prénom" ></td></tr>
    <tr><td><input id="t" name="T" type="text" placeholder="Téléphone" ></td></tr>
	<tr><td><input id="e" name="E" type="text" placeholder="Email" ></td></tr>
	<tr><td><input id="a" name="A" type="text" placeholder="Adresse" ></td></tr>
	<tr><td><button type="submit" onclick="VERIFIER()">S'inscrire</button></td></tr>
</table>     
        </form>
    </div>

<script language="JavaScript">
function VERIFIER(){
    let n=document.getElementById("n").value;
       if(n=="")       {alert("veuillez saisir votre nom!");
       return false;}
    let p=document.getElementById("p").value;
       if(p=="")       {alert("veuillez saisir votre prénom!");
       return false;}
    let t=document.getElementById("t").value;
       if(t=="")       {alert("veuillez saisir votre telephone!");
       return false;}
    let e=document.getElementById("e").value;
       if(e=="")       {alert("veuillez saisir votre email!");
       return false;}
    let a=document.getElementById("a").value;
    if(a=="")       {alert("veuillez saisir votre adresse!"); 
       return false;
    }
}
</script>
<?php
include('fonctions.php');
if(isset($_POST['N']) and isset($_POST['P']) and isset($_POST['T']) and isset($_POST['E']) and isset($_POST['A']))
{
    if((!empty($_POST['N'])) and (!empty($_POST['P'])) and (!empty($_POST['T'])) and (!empty($_POST['E'])) and (!empty($_POST['A'])))
    { 
    $sql1="select * from inscription where email='".$_POST['E']."'";
    $reponse = $bdd->query($sql1);
    $donnees = $reponse->fetch();

        if(empty($donnees))
        {   
            $sql2="insert into inscription(Nom,Prenom,tel,email,adresse) values('".$_POST['N']."','".$_POST['P']."','".$_POST['T']."','".$_POST['E']."','".$_POST['A']."')";
            $bdd->exec($sql2);
            echo "<script>alert(\"inscription reussite!\")</script>";
            header( 'location: comm.php');
        }
        else
        echo "<script>alert(\"compte existe deja!\")</script>";
    }
    else
    echo "<script>alert(\"veuillez remplir les champs!\")</script>";
}   


?>
</body>
</html>