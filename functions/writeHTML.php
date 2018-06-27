<?php
    function writeHeadElements() {
      echo "
      <meta charset='utf-8'>
      <title>Auto Filling</title>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
      ";
    }

    function writeNavbar($activePage) {
      // write navbar open tag
      echo "
      <nav class='navbar navbar-expand-lg navbar-dark bg-dark sticky-top'>
        <div class='container'>
          <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
          </button>

          <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav mr-auto'>";
        // write first navbar item (PR Template)
        if ($activePage == "index") {
          echo "<li class='nav-item active'>
                  <a class='nav-link' href='index.php'>PR Template<span class='sr-only'>(current)</span></a>
                </li>";
        }
        else {
          echo "<li class='nav-item'>
                  <a class='nav-link' href='index.php'>PR Template<span class='sr-only'>(current)</span></a>
                </li>";
        }
        // write second navbar item (Sales Contract)
        if ($activePage == "contract") {
          echo "<li class='nav-item active'>
                  <a class='nav-link' href='contract.php'>Sales Contract</a>
                </li>";
        }
        else {
          echo "<li class='nav-item'>
                  <a class='nav-link' href='contract.php'>Sales Contract</a>
                </li>";
        }
        // write third navbar item (Maintain Data)
        if ($activePage == "other"){
          echo "<li class='nav-item dropdown active'>
                  <a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'>
                    Maintain Data
                  </a>
                  <div class='dropdown-menu'>
                    <a class='dropdown-item' href='bpa.php'>BPA</a>
                    <a class='dropdown-item' href='productFamily.php'>Product Family</a>
                    <a class='dropdown-item' href='#'>Scenario</a>
                  </div>
                </li>";
        }
        else{
          echo "<li class='nav-item dropdown'>
                  <a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'>
                    Maintain Data
                  </a>
                  <div class='dropdown-menu'>
                    <a class='dropdown-item' href='bpa.php'>BPA</a>
                    <a class='dropdown-item' href='productFamily.php'>Product Family</a>
                    <a class='dropdown-item' href='#'>Scenario</a>
                    </div>
                </li>";
        }
        // write nav bar close tag
        echo "</ul>
            </div>
          </div>
        </nav>";

    }

    function writeScript() {
      echo "
        <script src='js/jquery-slim.min.js'></script>
        <script src='js/popper.js'></script>
        <script src='js/bootstrap.min.js'></script>
      ";
    }
?>
