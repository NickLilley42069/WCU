<?php
require "../templates/RMS-Mockup-HEADER.html";
?>


<div id="pageTitle">
    <h2>Home</h2>
</div>

<hr id="gap">

<div class="MainContent">
 <div class="slideshow-container">

<!--https://www.w3schools.com/howto/howto_js_slideshow.asp-->

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img class="imgSize" src="https://www.northampton.ac.uk/wp-content/uploads/2024/09/waterside-campus-external-and-river-gallery.jpg">
    <div class="infoCard">Caption One</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img class="imgSize" src="https://www.northampton.ac.uk/wp-content/uploads/2022/08/learning-hub-stairs-gallery.jpg" style="width:100%">
    <div class="infoCard">Caption Two</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img class="imgSize" src="https://www.northampton.ac.uk/wp-content/uploads/2022/08/learning-hub-screen-gallery.jpg" style="width:100%">
    <div class="infoCard">Caption Three</div>
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>

<!--To follow what I had proposed in the wireframe, I want to add an image carousel here -->
<?php
require "../templates/RMS-Mockup-FOOTER.html";
?>
