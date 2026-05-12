<h1>Study at Woodlands University College - Check out our Subject Areas</h1>

<div class="searchBox">
    <form action="/index.php/subjects" method="get">
        <input type='text' name='searchBar' id='searchBar' placeholder="Search for a course..." value="<?php echo $searchTerm ?? ''; ?>">
        <button type="submit">Search</button>
        <?php if ($searchTerm): ?>
            <a href="/index.php/subjects">Clear Search</a>
        <?php endif; ?>
    </form>
</div>

<hr id="gap">

<div class="MainContent">

<?php
echo $output
?>

<?php if (empty($output)): ?>
        <p>No courses found matching "<?php echo htmlspecialchars($searchTerm ?? ''); ?>"</p>
    <?php endif; ?>

</div>

<!--Filter Options-->
<div>
</div>
<div id="subjectBox">


<h1>Subject One</h1>
  <p>Subject Description</p>
<hr id="gap">
<section class="Courses">
    <container id="course"><a id="hideLink" href="/index.php/subjects" >
        <img src="https://picsum.photos/536/354" alt="">   
         <h2>Course 1</h2>
         <p>Description</p>
    <p class="learnMore">Learn More</p>
    </a></container>
    <container id="course"><a id="hideLink" href="/index.php/subjects" >
        <img src="https://picsum.photos/536/354" alt="">   
         <h2>Course 2</h2>
         <p>Description</p>
         <p class="learnMore">Learn More</p>
    </a></container>
    <container id="course"><a id="hideLink" href="/index.php/subjects" >
        <img src="https://picsum.photos/536/354" alt="">    
        <h2>Course 3</h2>
        <p>Description</p>
        <p class="learnMore">Learn More</p>
    </a></container>
</section>
<hr id="gap">
</div>