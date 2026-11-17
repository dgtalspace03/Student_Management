<x-layouts::admin>
    

<div class="py-2" style="max-width: 960px;">

  <a href="{{ route('admin-course') }}" class="text-decoration-none">&larr; Back to courses</a>

  <!-- Course summary -->
  <div class="d-flex align-items-center gap-3 mt-3 mb-4">
    <img src="https://placehold.co/600x400/dc3545/ffffff?text=Laravel" alt="" width="96" class="rounded">
    <div>
      <h2 class="h2 mb-1">Laravel for Beginners</h2>
      <span class="badge text-bg-primary">Backend</span>
      <span class="text-muted ms-2">8 lessons &middot; 5 hours 15 min</span>
    </div>
  </div>

  <div class="row g-4">

    <!-- Lessons list -->
    <div class="col-lg-7">
      <div class="card shadow-sm">
        <div class="card-header bg-white fw-semibold">Lessons</div>
        <ol class="list-group list-group-flush list-group-numbered">

          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="me-auto ms-2">Introduction and setup</span>
            <span class="text-muted me-3">15 min</span>
            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#removeModal" data-name="Introduction and setup">Remove</button>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="me-auto ms-2">Routing basics</span>
            <span class="text-muted me-3">30 min</span>
            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#removeModal" data-name="Routing basics">Remove</button>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="me-auto ms-2">Controllers and requests</span>
            <span class="text-muted me-3">40 min</span>
            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#removeModal" data-name="Controllers and requests">Remove</button>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="me-auto ms-2">Blade templates</span>
            <span class="text-muted me-3">45 min</span>
            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#removeModal" data-name="Blade templates">Remove</button>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="me-auto ms-2">Eloquent models</span>
            <span class="text-muted me-3">50 min</span>
            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#removeModal" data-name="Eloquent models">Remove</button>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="me-auto ms-2">Migrations and seeders</span>
            <span class="text-muted me-3">40 min</span>
            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#removeModal" data-name="Migrations and seeders">Remove</button>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="me-auto ms-2">Forms and validation</span>
            <span class="text-muted me-3">50 min</span>
            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#removeModal" data-name="Forms and validation">Remove</button>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="me-auto ms-2">Deploying your app</span>
            <span class="text-muted me-3">45 min</span>
            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#removeModal" data-name="Deploying your app">Remove</button>
          </li>

        </ol>

        <!-- Empty state: show this when the course has no lessons -->
        <!--
        <div class="card-body text-center text-muted py-4">No lessons added yet.</div>
        -->
      </div>
    </div>

    <!-- Add lesson -->
    <div class="col-lg-5">
      <!-- Dummy: Add just reloads this page -->
      <form action="admin-course-lessons.html" class="card shadow-sm">
        <div class="card-header bg-white fw-semibold">Add lesson</div>
        <div class="card-body row g-3">
          <div class="col-12">
            <label class="form-label" for="title">Lesson title</label>
            <input type="text" id="title" class="form-control" required>
          </div>
          <div class="col-12">
            <label class="form-label" for="duration">Duration (minutes)</label>
            <input type="number" id="duration" min="1" class="form-control" required>
          </div>
          <div class="col-12">
            <label class="form-label" for="video">Video URL <span class="text-muted">(optional)</span></label>
            <input type="text" id="video" class="form-control" placeholder="https://...">
          </div>
        </div>
        <div class="card-footer bg-white">
          <button type="submit" class="btn btn-success w-100">Add lesson</button>
        </div>
      </form>
    </div>

  </div>
</div>

</x-layouts::admin>
