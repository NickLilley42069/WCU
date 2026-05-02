<?php
require "../Includes/RMS-Mockup-HEADER.html";
?>

<!-- Information about the course-->

<div class="MainContent">
    <h1 class="MainContentH">Courses</h1>
<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illum officiis laboriosam similique doloribus laborum nisi recusandae ut earum fuga unde natus repellendus deleniti, animi impedit, et voluptatibus minima omnis aperiam.
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam molestias exercitationem voluptate natus veritatis accusantium earum voluptas repellendus, officiis praesentium fugit eum eligendi deserunt rem possimus sed eaque recusandae temporibus.
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod dolorem ad voluptatum nesciunt. Quos est autem eveniet recusandae harum fugiat expedita magni totam, eum ipsa natus, minima modi dicta deleniti!
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit quam nemo itaque voluptates debitis totam voluptatum, odit corporis cum eaque hic natus sit ipsam repellat ea neque? Accusamus, obcaecati tenetur.
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima a, blanditiis iure, eaque illo itaque autem ullam deleniti laborum quo voluptates perferendis ab sint quasi velit facilis error suscipit modi.
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta numquam accusamus nostrum cum, dolores assumenda aut quae amet ad maiores facilis sunt, magni eligendi recusandae quis quod pariatur aliquam. Harum.
</p>
</div>

<hr id="gap">
<div id="list">
    <ul>
        <li class="item"><a style="color: white;">Students</a></li>
<!--
What I want here is a dual dropdown menu so depending on what you pick, it will alter the 
results, so if you choose students in yr1 - it shows students on this course in year 1, 
if you choose 2nd year in modules, it shows the modules in the 2nd year, I want this to
then show a button to take you to the module section or the student section showing
the results from what you would choose,            
-->
        <li class="item"><a style="color: white;">Modules</a></li>
    </ul>
    <ul>
        <li class="item2">1st Year</li>
        <li class="item2">2nd Year</li>
        <li class="item2">3rd Year</li>
        <li class="item2">Additional</li>
    </ul>
</div>

<!--List of results -->
<section class="List">
</section>

<!--The button i said about before -->
<label id="btnForList">View</label>

<?php
require "../Includes/RMS-Mockup-FOOTER.html";
?>