<div class="page-subjects">
  <div class="subjects-hero">
    <h1>Study at Woodlands University College</h1>
    <p>Discover your subject area and find the course that's right for you</p>
    <div class="search-wrap">
      <form class="search-inner" action="/subjects" method="get">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#b39cc4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        <input type="text" name="searchBar" id="searchBar"
               placeholder="Search for a course..."
               value="<?php echo htmlspecialchars($searchTerm ?? ''); ?>">
        <button type="submit" class="search-btn">Search</button>
        <?php if (!empty($searchTerm)): ?>
          <a href="/subjects" class="clear-link">Clear</a>
        <?php endif; ?>
      </form>
    </div>
  </div>

  <?php if (!empty($searchTerm)): ?>
    <div class="search-results">
      <?php if (!empty($allCourses)): ?>
        <div class="subjects-body">
          <div class="dept-header" style="margin-bottom:8px;">
            <h2>Results for "<?php echo htmlspecialchars($searchTerm); ?>"</h2>
            <span class="dept-badge"><?php echo count($allCourses); ?> course<?php echo count($allCourses) !== 1 ? 's' : ''; ?></span>
          </div>
          <hr class="dept-rule">
          <div class="scroll-track">
            <?php foreach ($allCourses as $course): ?>
              <div class="course-card" data-course-id="<?php echo $course->course_id; ?>" role="button" tabindex="0">
                <img src="https://picsum.photos/seed/<?php echo $course->course_id; ?>/400/240"
                     alt="<?php echo htmlspecialchars($course->course_title); ?>">
                <div class="card-body">
                  <h3><?php echo htmlspecialchars($course->course_title); ?></h3>
                  <p><?php echo htmlspecialchars(substr($course->course_description, 0, 90)); ?>...</p>
                  <span class="card-cta">View details →</span>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
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
              <div class="course-card" data-course-id="<?php echo $course->course_id; ?>" role="button" tabindex="0">
                <img src="https://picsum.photos/seed/<?php echo $course->course_id; ?>/400/240"
                     alt="<?php echo htmlspecialchars($course->course_title); ?>">
                <div class="card-body">
                  <h3><?php echo htmlspecialchars($course->course_title); ?></h3>
                  <p><?php echo htmlspecialchars(substr($course->course_description, 0, 90)); ?>...</p>
                  <span class="card-cta">View details →</span>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </section>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

</div>

<!-- Course detail modal -->
<div id="courseModal" class="modal-backdrop" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
  <div class="modal-box">
    <button class="modal-close" id="modalClose" aria-label="Close">&times;</button>
    <img id="modalImg" src="" alt="" class="modal-img">
    <div class="modal-content">
      <p id="modalDept" class="modal-dept"></p>
      <h2 id="modalTitle" class="modal-title"></h2>
      <div id="modalMeta" class="modal-meta"></div>
      <p id="modalDesc" class="modal-desc"></p>
      <div id="modalModules" class="modal-modules"></div>
    </div>
  </div>
</div>

<script>
const courseData = <?php echo json_encode($courseDataMap, JSON_HEX_TAG | JSON_HEX_AMP); ?>;

const modal    = document.getElementById('courseModal');
const closeBtn = document.getElementById('modalClose');

function openModal(courseId) {
  const c = courseData[courseId];
  if (!c) return;

  document.getElementById('modalImg').src = 'https://picsum.photos/seed/' + courseId + '/800/400';
  document.getElementById('modalImg').alt = c.title;
  document.getElementById('modalDept').textContent  = c.department;
  document.getElementById('modalTitle').textContent = c.title;
  document.getElementById('modalDesc').textContent  = c.description;

  const metaItems = [
    { icon: '🎓', label: 'Award',        value: c.award_type },
    { icon: '📅', label: 'Duration',     value: c.duration },
    { icon: '📚', label: 'Study Mode',   value: c.study_mode },
    { icon: '✅', label: 'Entry Req.',   value: c.entry_requirements },
  ].filter(item => item.value);

  document.getElementById('modalMeta').innerHTML = metaItems.map(item =>
    '<div class="meta-item"><span class="meta-icon">' + item.icon + '</span>' +
    '<div><span class="meta-label">' + item.label + '</span>' +
    '<span class="meta-value">' + item.value + '</span></div></div>'
  ).join('');

  const modDiv = document.getElementById('modalModules');
  if (c.modules.length > 0) {
    modDiv.innerHTML = '<h4>Modules</h4><ul>' +
      c.modules.map(m => '<li>' + m + '</li>').join('') +
    '</ul>';
  } else {
    modDiv.innerHTML = '';
  }

  modal.classList.add('active');
  document.body.style.overflow = 'hidden';
}

function closeModal() {
  modal.classList.remove('active');
  document.body.style.overflow = '';
}

document.querySelectorAll('.course-card').forEach(card => {
  card.addEventListener('click', () => openModal(card.dataset.courseId));
  card.addEventListener('keydown', e => { if (e.key === 'Enter' || e.key === ' ') openModal(card.dataset.courseId); });
});

closeBtn.addEventListener('click', closeModal);
modal.addEventListener('click', e => { if (e.target === modal) closeModal(); });
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });
</script>
