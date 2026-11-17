<x-layouts::teacher>
    

  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h2 class="h2 mb-0">My courses</h2>
      <small class="text-muted">Courses assigned to you</small>
    </div>
    <span class="badge text-bg-secondary fs-6">4 courses</span>
  </div>

  <div class="row g-4">
    <div class="col-md-6 col-lg-4">
      <div class="card h-100 shadow-sm">
        <img src="https://placehold.co/600x400/dc3545/ffffff?text=Laravel" class="card-img-top" alt="">
        <div class="card-body d-flex flex-column">
          <span class="badge text-bg-primary align-self-start mb-2">Backend</span>
          <h5 class="card-title">Laravel for Beginners</h5>
          <p class="card-text text-muted small">Routing, Blade, Eloquent and authentication with Jetstream.</p>
          <div class="mt-auto d-flex justify-content-between align-items-center">
            <small class="text-muted">8,250 students</small>
            <a href="{{ route('teacher-course-details',5) }}" class="btn btn-sm btn-primary">View details</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4">
      <div class="card h-100 shadow-sm">
        <img src="https://placehold.co/600x400/0d6efd/ffffff?text=Web+Development" class="card-img-top" alt="">
        <div class="card-body d-flex flex-column">
          <span class="badge text-bg-primary align-self-start mb-2">Web Development</span>
          <h5 class="card-title">Web Development Bootcamp</h5>
          <p class="card-text text-muted small">HTML, CSS, JavaScript and responsive design from scratch.</p>
          <div class="mt-auto d-flex justify-content-between align-items-center">
            <small class="text-muted">12,480 students</small>
            <a href="teacher-course-details.html" class="btn btn-sm btn-primary">View details</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4">
      <div class="card h-100 shadow-sm">
        <img src="https://placehold.co/600x400/fd7e14/ffffff?text=MySQL+Databases" class="card-img-top" alt="">
        <div class="card-body d-flex flex-column">
          <span class="badge text-bg-primary align-self-start mb-2">Database</span>
          <h5 class="card-title">Database Design with MySQL</h5>
          <p class="card-text text-muted small">ER diagrams, normalization, joins and query optimization.</p>
          <div class="mt-auto d-flex justify-content-between align-items-center">
            <small class="text-muted">5,420 students</small>
            <a href="teacher-course-details.html" class="btn btn-sm btn-primary">View details</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4">
      <div class="card h-100 shadow-sm">
        <img src="https://placehold.co/600x400/212529/ffffff?text=Git+%26+GitHub" class="card-img-top" alt="">
        <div class="card-body d-flex flex-column">
          <span class="badge text-bg-primary align-self-start mb-2">Tools</span>
          <h5 class="card-title">Git &amp; GitHub Workflow</h5>
          <p class="card-text text-muted small">Branching, pull requests and team collaboration.</p>
          <div class="mt-auto d-flex justify-content-between align-items-center">
            <small class="text-muted">15,760 students</small>
            <a href="teacher-course-details.html" class="btn btn-sm btn-primary">View details</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Empty state: show this when no course is assigned -->
  <!--
  <div class="text-center text-muted py-5">No courses have been assigned to you yet.</div>
  -->


</x-layouts::teacher>