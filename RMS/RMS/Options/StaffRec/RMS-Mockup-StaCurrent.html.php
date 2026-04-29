<?php
require "../../Includes/RMS-Mockup-HEADER.html";
?>
<div id="list">
    <ul>
        <li class="item"><a id="hideLink" href="../RMS-Mockup-StaffRec.html.php" >Overview</a></li>
        <li class="item"><a id="hideLink" href="/RMS/Options/StaffRec/RMS-Mockup-StaApplication.html.php" >Staff Application</a></li>
        <li class="item" id="thatOne"><a id="hideLink" href="/RMS/Options/StaffRec/RMS-Mockup-StaCurrent.html.php" >Current Staff</a></li>
        <li class="item"><a id="hideLink" href="/RMS/Options/StaffRec/RMS-Mockup-StaPast.html.php" >Past Staff</a></li>
    </ul>
</div>

<h1>Current Staff</h1>

<!--LIST OF STAFF! -->
<section class="List">
</section>

<!--Selected -->
<section id="Selected">
<p>Selected; <p id="selection"> Jane Doe - 222222222 / Teaches</p> </p>
</section>

<!--Options -->
<section id="RecOptions">
    <div class="Recoption">
        <a id="hideLink"href="/RMS/Options/StaffRec/RMS-Mockup-StaffProfile.html.php">View Staff</a>
    </div>
    <div class="Recoption">
        <a id="hideLink" href="/RMS/Options/RMS-Mockup-Timetable.html.php">Timetable</a>
    </div>
    <div class="Recoption">
        <a id="hideLink" href="">Contact</a>
    </div>
        <div class="Recoption">
        <p>Grading</p>
    </div>
</section>

<?php
require "../../Includes/RMS-Mockup-FOOTER.html";
?>