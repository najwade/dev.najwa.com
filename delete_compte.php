<?php 
   require 'connexion.php';
   $numcpt=$_GET['num_cpt'];

   $query=mysqli_query($bdd,"DELETE FROM compte where Num_Cpt='$numcpt'");
   if(isset($query)){
   	setcookie('success','Supression avec success',time()+3);
      header("location:liste_compte.php");
   }

 ?>