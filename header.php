<header>
  <div class="logo">
    <img src="img/logo.png" alt="Logo">
  </div>
  <nav>
    <ul>
      <li><a href="connexion.php">Connexion</a></li>
    </ul>
  </nav>
 <? 
if(isset($_SESSION['user_nom'])) {
    echo "Bonjour, " . $_SESSION['user_nom'] . " !";
} 
?>
</header>
</header>