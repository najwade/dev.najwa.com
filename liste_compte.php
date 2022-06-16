 <?php include("head.php");
  require 'connexion.php';
 ?>
 <!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Listes des comptes</h2><hr>
<?php 
  if(isset($_COOKIE['success'])){
  	echo "<h3 style='color:green;'>".$_COOKIE['success']."</h3>";
  }

 ?>
<table>
  <tr>
    <th>Numero Compte</th>
    <th>Numero Client</th>
    <th>Nom Client</th>
    <th>Type Compte</th>
    <th>Solde Bancaire</th>
    <th>Solde Reel</th>
  </tr>
  <?php 
  $query=mysqli_query($bdd,"SELECT * from compte order By Num_Cpt DESC");
 	while($rows=mysqli_fetch_assoc($query)){
   ?>
   <tr>
   	<td><?= $rows['Num_Cpt'];  ?></td>
   <td><?= $rows['Num_Clt'];  ?></td>
   <td><?= $rows['Nom_Clt'];  ?></td>
   <td><?= $rows['Type_Cpt'];  ?></td>
   <td><?= $rows['Solde_Bancaire'];  ?></td>
   <td><?= $rows['Solde_Reel'];  ?></td>
   <td><a href="modifier_compte.php?num_cpt=<?= $rows['Num_Cpt']; ?>">Modifier</a></td>
   <td><a onclick="return confirm('Tu est sur de supprimer ce compte !');" href="delete_compte.php?num_cpt=<?= $rows['Num_Cpt']; ?>">
   	Supprimer
   </a></td>
   </tr>
<?php } ?>

</table>

</body>
</html>