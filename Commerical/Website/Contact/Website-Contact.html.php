<?php
require "../includes/Website-Mockup-HEADER.html";
?>


<div id="HeaderWebsite">

<h1>Curious about Woodlands?</h1>
<h2>We are curious about you too! If you want to know more about us, please let us know here.</h2>

</div>
<hr id="gap">

<form id="formBox">
    <div class="formCredentials">
    <p class="formTXT">Name</p>
    <input></input>
    <p class="formTXT">Email</p>
    <input></input>
    </div>
            <p class="formTXT">What does your query regard?</p>
                    <select class="formSelect">
                        <option>Reason One</option>
                        <option>Reason Two</option>
                        <option>Reason Three</option>
                        <option>Reason Four</option>
                        <option>Other</option>
                    </select>
    <!--Probably better to do a dropdown here with a list of reasons -->
            <input class="formOther"></input>
    <textarea id="formQuery" placeholder="Please enter your query here!"></textarea>
    <button id="formButton">Submit</button>
</form>

<hr id="gap">

<?php
require "../includes/Website-Mockup-FOOTER.html";
?>
