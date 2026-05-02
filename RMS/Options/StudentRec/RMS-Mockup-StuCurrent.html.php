<?php
require "../../Includes/RMS-Mockup-HEADER.html";
?>
<div id="list">
    <ul>
        <li class="item"><a id="hideLink" href="../RMS-Mockup-StudentRec.html.php" >Overview</a></li>
        <li class="item"><a id="hideLink" href="/RMS/Options/StudentRec/RMS-Mockup-StuApplication.html.php" >Student Applications</a></li>
        <li class="item" id="thatOne"><a id="hideLink" href="/RMS/Options/StudentRec/RMS-Mockup-StuCurrent.html.php" >Current Students</a></li>
        <li class="item"><a id="hideLink" href="/RMS/Options/StudentRec/RMS-Mockup-StuPast.html.php" >Past Students</a></li>
    </ul>
</div>

<h1>Current Student</h1>

<!--LIST OF STUDENTS! -->
<section class="List">
</section>

<!--Selected -->
<section id="Selected">
<p>Selected; <p id="selection"> John Doe - 111111111 / Course</p> </p>
</section>

<!--Options -->
<section id="RecOptions">
    <div class="Recoption">
        <a id="hideLink" href="/RMS/Options/StudentRec/RMS-Mockup-StudentProfile.html.php">View Student</a>
    </div>
    </div>
    <div class="Recoption">
        <a id="hideLink" href="/RMS/Options/RMS-Mockup-Timetable.html.php">Timetable</a>
    </div>
    <div class="Recoption">
        <a id="hideLink" href="">Contact</a>
    </div>
    <div class="Recoption">
        <p>Grademap</p>
    </div>
</section>

<?php
require "../../Includes/RMS-Mockup-FOOTER.html";
?>