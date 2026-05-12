<div class='courseObj'>
    <h2> <?php echo $courseTitle?> </h2>
    <p><strong>Course Description: </strong> <?php echo $courseDescription?> </p>
    <h3>Modules: </h3>

    </br>
    <div>
    <?php echo $moduleOutput ?>
    </div>
    
    <form action="/index.php/downloadAwardMap" method="get">
        <input type="hidden" name="course_id" value="<?= $courseID ?>">
        <button type="submit">Download Award Map</button>
    </form>
<br>

</div>

<hr id="gap">
