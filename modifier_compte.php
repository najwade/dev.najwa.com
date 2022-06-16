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



div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>
<hr>
<h3>Modifier Le compte  <?php 
   echo $_GET['num_cpt'];
 ?></h3>
<hr>
<?php  
  //Get Data
   if(isset($_GET['num_cpt'])){
    $num_cpt=$_GET['num_cpt'];
    $query=mysqli_query($bdd,"SELECT * from compte where Num_Cpt='$num_cpt'");
    $data=mysqli_fetch_assoc($query);
   }



  if(isset($_POST['send'])){
    $numcpt1=$_POST['num_cpt'];
  	$numcpt=$_POST['numcpt'];
  	$numclt=$_POST['numclt'];
  	$nomclt=$_POST['nomclt'];
  	$typeclt=$_POST['typeclt'];
  	$soldebc=$_POST['soldebc'];
  	$soldereel=$_POST['soldereel'];

    $query=mysqli_query($bdd,"UPDATE `compte` SET `Num_Cpt`='$numcpt',`Num_Clt`='$numclt',`Nom_Clt`='$nomclt',`Type_Cpt`='$typeclt',`Solde_Bancaire`='$soldebc',`Solde_Reel`='$soldereel' WHERE Num_Cpt='$numcpt1'");
    if(isset($query)){
      setcookie('success','Modification avec success',time()+3);
      header("location:liste_compte.php");
    }


  }

 ?>
<div>
  <form action="" method="POST">
   <input type="hidden" name="num_cpt" value="<?php echo $_GET['num_cpt']; ?>">
    <label>Numero de compte</label>
    <input type="text"  name="numcpt" placeholder="Numero de compte ......" value="<?php echo $data['Num_Cpt']; ?>">

  <label>Numero de client</label>
    <input type="text"  name="numclt" placeholder="Numero de client ......" value="<?php echo $data['Num_Clt']; ?>">
  
    <label>Nom de client</label>
    <input type="text"  name="nomclt" placeholder="Nom de client ......" value="<?php echo $data['Nom_Clt']; ?>">


     <label >Type de compte</label>

    <select  name="typeclt">
      <option>
        <?php echo $data['Type_Cpt']; ?>
      </option>
      <option value="Cheque">Cheque</option>
      <option value="Epargne">Epargne</option>
    </select>

         <label>Solde Bancaire</label>
    <input type="text"  name="soldebc" placeholder="Solde bancaire ......" value="<?php echo $data['Solde_Bancaire']; ?>">

         <label>Solde Reel</label>
    <input type="text"  name="soldereel" placeholder="Solde Reel ......" value="<?php echo $data['Solde_Reel']; ?>">

    <input type="submit" value="Modifier" name="send">
  </form>
</div>

</body>
</html>