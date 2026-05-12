<div class="page-subjects">

  <div class="subjects-hero">
    <h1>Study at Woodlands University College</h1>
    <p>Discover your subject area and find the course that's right for you</p>
    <div class="search-wrap">
      <form class="search-inner" action="/index.php/subjects" method="get">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#b39cc4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        <input type="text" name="searchBar" id="searchBar"
               placeholder="Search for a course..."
               value="<?php echo htmlspecialchars($searchTerm ?? ''); ?>">
        <button type="submit" class="search-btn">Search</button>
        <?php if (!empty($searchTerm)): ?>
          <a href="/index.php/subjects" class="clear-link">Clear</a>
        <?php endif; ?>
      </form>
    </div>
  </div>

  <?php if (!empty($searchTerm)): ?>
    <div class="search-results">
      <?php if (!empty($output)): ?>
        <?php echo $output; ?>
      <?php else: ?>
        <p class="no-results">No courses found matching "<?php echo htmlspecialchars($searchTerm); ?>"</p>
      <?php endif; ?>
    </div>
  <?php else: ?>
    <div class="subjects-body">
      <?php foreach ($departments as $department): ?>
        <?php
          $deptCourses = array_filter((array)$allCourses, fn($c) =>
            (int)$c->department_id === (int)$department->department_id
          );
        ?>
        <?php if (!empty($deptCourses)): ?>
        <section class="dept-section">
          <div class="dept-header">
            <h2><?php echo htmlspecialchars($department->department_name); ?></h2>
            <span class="dept-badge"><?php echo count($deptCourses); ?> course<?php echo count($deptCourses) !== 1 ? 's' : ''; ?></span>
          </div>
          <p class="dept-sub">Explore our range of <?php echo htmlspecialchars($department->department_name); ?> courses</p>
          <hr class="dept-rule">
          <div class="scroll-track">
            <?php foreach ($deptCourses as $course): ?>
              <a class="course-card" href="/index.php/course?course_id=<?php echo $course->course_id; ?>">
                <img src="https://picsum.photos/seed/<?php echo $course->course_id; ?>/400/240"
                     alt="<?php echo htmlspecialchars($course->course_title); ?>">
                <div class="card-body">
                  <h3><?php echo htmlspecialchars($course->course_title); ?></h3>
                  <p><?php echo htmlspecialchars(substr($course->course_description, 0, 90)); ?>...</p>
                  <span class="card-cta">Learn more →</span>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
        </section>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

</div>