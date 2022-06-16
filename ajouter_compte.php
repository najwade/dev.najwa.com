 <?php include("head.php");
  require 'connexion.php';
 ?>
 <!DOCTYPE html>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: rgb(255, 204, 255);;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
button{
  background-color: rgb(255, 204, 255);;
  color: blue;
  padding: 10px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  font-weight: bold;
  cursor: pointer;
}



div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>
	<a href="liste_compte.php">
	<button>Consulté la listes des comptes</button>
</a>
<hr>
<h3>Ajouter un compte</h3>
<hr>
<?php  
  if(isset($_POST['send'])){
  	$numcpt=$_POST['numcpt'];
  	$numclt=$_POST['numclt'];
  	$nomclt=$_POST['nomclt'];
  	$typeclt=$_POST['typeclt'];
  	$soldebc=$_POST['soldebc'];
  	$soldereel=$_POST['soldereel'];

     $verify=mysqli_query($bdd,"SELECT * from compte where Num_Cpt='$numcpt'");
     
     if (mysqli_num_rows($verify)>0){
 	echo "<h3 style='color:red;'>Ce Compte est existe déja<h3/>";
     }else{
     	$query=mysqli_query($bdd,"INSERT INTO `compte`(`Num_Cpt`, `Num_Clt`, `Nom_Clt`, `Type_Cpt`, `Solde_Bancaire`, `Solde_Reel`) VALUES('$numcpt','$numclt','$nomclt','$typeclt','$soldebc','$soldereel') ");
     	if(isset($query)){
     		header("location:liste_compte.php");
     	}
     }


  }

 ?>
<div>
  <form action="" method="POST">
    <label>Numero de compte</label>
    <input type="text"  name="numcpt" placeholder="Numero de compte ......">

  <label>Numero de client</label>
    <input type="text"  name="numclt" placeholder="Numero de client ......">
  
    <label>Nom de client</label>
    <input type="text"  name="nomclt" placeholder="Nom de client ......">


     <label >Type de compte</label>
    <select  name="typeclt">
      <option value="Cheque">Cheque</option>
      <option value="Epargne">Epargne</option>
    </select>

         <label>Solde Bancaire</label>
    <input type="text"  name="soldebc" placeholder="Solde bancaire ......">

         <label>Solde Reel</label>
    <input type="text"  name="soldereel" placeholder="Solde Reel ......">

    <input type="submit" value="Envoyer" name="send">
  </form>
</div>

</body>
</html>