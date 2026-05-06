<?php
require "../../includes/Portal-Mockup-HEADER.html";
?>
<div id="listForPat">
<!--A cool thing we can do is use a sort of active navigation page, when we go to a page,
it makes that page darker/lighter AND when it  -->
    <ul>
        <li class="itemPat" id="thatOne"><a id="hideLink" href="Portal-Mockup-PAT.html.php" >Overview</a></li>
        <li class="itemPat"><a id="hideLink" href="Portal-Mockup-bookMeeting.html.php" >Book Meeting</a></li>
        <li class="itemPat"><a id="hideLink" href="Portal-Mockup-Feedback.html.php" >Feedback</a></li>
        <li class="itemPat"><a id="hideLink" href="Portal-Mockup-upcomingMeeting.html.php" >Upcoming Meetings</a></li>
        <li class="itemPat"><a id="hideLink" href="Portal-Mockup-pastMeeting.html.php" >Past Meetings</a></li>
    </ul>
</div>

<h2 >Welcome to your PAT page!</h2>

<!-- Widget for either feedback from last meeting or scheduled appointment -->
<div id="Widget">
    <section id="widgetPat"><a id="hideLink" href="Portal-Mockup-upcomingMeeting.html.php" >
        <p>Upcoming Appointment's;</p>
        <container class="WidgetSpecific">[DATE]</container>
    </section>

    <section id="widgetPat"><a id="hideLink" href="Portal-Mockup-Feedback.html.php" >
        <p>Feedback from your last appointment;</p>
        <container class="WidgetSpecific">[FEEDBACK]</container>
    </section>
</div>

<?php
require "../../Includes/Portal-Mockup-FOOTER.html";
?>