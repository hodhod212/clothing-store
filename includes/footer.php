   <footer>
    <div class="branding"> <img src="../images/logo.png" alt="Logo"> </div>
   
    <nav>
      <ol>
        <li><a href="#">About the ClothingStore</a></li>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Visit our website</a></li>
      </ol>
    </nav>
  
        <div class="footerBottom">
<?php

function ClothingStore($startYear) {
    $currentYear = date('Y');
    if ($startYear < $currentYear) {
        $currentYear = date('y');
        return "&copy; $startYear&ndash;$currentYear";
    } else {
        return "&copy; $startYear";
    }
}

echo ClothingStore(2018);
?>
  </div>
      </footer>