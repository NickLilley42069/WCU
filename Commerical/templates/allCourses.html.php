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
    <?php echo $output ?>
    <?php if (empty($output)): ?>
        <p>No courses found matching "<?php echo htmlspecialchars($searchTerm ?? ''); ?>"</p>
    <?php endif; ?>
</div>

<!--Filter Options-->
<div></div>

<?php foreach ($departments as $department): ?>
<div id="subjectBox">
    <h1><?php echo htmlspecialchars($department['name']); ?></h1>
    <p><?php echo htmlspecialchars($department['description']); ?></p>
    <hr id="gap">
    <section class="Courses">

        <?php foreach ($department['courses'] as $course): ?>
        <container id="course">
            <a id="hideLink" href="<?php echo htmlspecialchars($course['url']); ?>">
                <img src="https://picsum.photos/536/354" alt="">
                <h2><?php echo htmlspecialchars($course['name']); ?></h2>
                <p><?php echo htmlspecialchars($course['description']); ?></p>
                <p class="learnMore">Learn More</p>
            </a>
        </container>
        <?php endforeach; ?>

    </section>
    <hr id="gap">
</div>
<?php endforeach; ?>