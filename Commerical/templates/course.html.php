<div class='courseObj'>

    <h2> <?php echo $courseTitle?> </h2>

    <p><strong>Course Description: </strong> <?php echo $courseDescription?> </p>

    <p><strong>Department ID: </strong> <?php echo $departmentID?> </p>

    <h3>Modules: </h3>

    </br>

    <div>

    <?php echo $moduleOutput ?>

    </div>

    
    <form action="/downloadAwardMap" method="get">
        <input type="hidden" name="course_id" value="<?= $courseID ?>">
        <button type="submit">Download Award Map</button>
    </form>


</div>

<hr id="gap">
