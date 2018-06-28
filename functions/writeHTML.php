<?php
  /*
    This file contains functions to write the basic HTML that every pages
    require
  */

  // function to write elements <head> tag
    function writeHeadElements() {
      echo "
      <meta charset='utf-8'>
      <title>Auto Filling</title>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
      <link href='css/bootstrap-4-navbar.css' rel='stylesheet'>
      ";
    }
    // function to write the nav bar
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
          echo "<li class='nav-item dropdown active'>";
        }
        else{
          echo "<li class='nav-item dropdown'>";
        }
        echo "
            <a class='nav-link dropdown-toggle' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='cursor: pointer;'>
                Maintain Data
            </a>
            <ul class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                <li><a class='dropdown-item' href='productFamily.php'>Product Family</a></li>
                <li><a class='dropdown-item' href='subproject.php'>Subproject</a></li>
                <li><a class='dropdown-item' href='scenario.php'>TI Scenario</a></li>
                <li><a class='dropdown-item dropdown-toggle' href='#'>BPA</a>
                    <ul class='dropdown-menu'>
                        <li><a class='dropdown-item' href='bpa.php?type=ti'>TI (RAN)</a></li>
                        <li><a class='dropdown-item' href='bpa.php?type=rf'>RF</a></li>
                        <li><a class='dropdown-item' href='bpa.php?type=fiber'>Fiber</a></li>
                        <li><a class='dropdown-item' href='bpa.php?type=microwave'>Microwave (TX)</a></li>
                        <li><a class='dropdown-item' href='bpa.php?type=tssr'>TSSR</a></li>

                    </ul>
                </li>
            </ul>
        </li>
        </ul>
          </div>
        </div>
        </nav>
        ";
    }
    // function to write the JavaScript link required
    function writeScript() {
      echo "
        <script src='js/jquery-slim.min.js'></script>
        <script src='js/popper.js'></script>
        <script src='js/bootstrap.min.js'></script>
        <script src='js/bootstrap-4-navbar.js'></script>
      ";
    }
?>
