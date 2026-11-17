<x-layouts::teacher>
    <a href="{{ route('teacher') }}" class="text-decoration-none">&larr; Back to my courses</a>

  <!-- Course details -->
  <div class="card shadow-sm mt-3 mb-4">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="https://placehold.co/600x400/dc3545/ffffff?text=Laravel" class="img-fluid rounded-start w-100 h-100" style="object-fit:cover;" alt="">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <span class="badge text-bg-primary mb-2">Backend</span>
          <h2 class="h2">Laravel for Beginners</h2>
          <p class="text-muted">Routing, Blade, Eloquent and authentication with Jetstream.</p>
          <div class="row text-center g-2 mt-3">
            <div class="col-4"><div class="border rounded py-2"><div class="fw-bold fs-5">8,250</div><small class="text-muted">Students</small></div></div>
            <div class="col-4"><div class="border rounded py-2"><div class="fw-bold fs-5">$59.99</div><small class="text-muted">Price</small></div></div>
            <div class="col-4"><div class="border rounded py-2"><div class="fw-bold fs-5">12</div><small class="text-muted">Lessons</small></div></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Lessons -->
  <div class="card shadow-sm mb-4">
    <div class="card-header bg-white fw-semibold">
      Lessons <span class="text-muted fw-normal">(12 lessons, 8 hours 50 min)</span>
    </div>
    <ol class="list-group list-group-flush list-group-numbered">
        <li class="list-group-item d-flex justify-content-between">
          <span class="me-auto ms-2">Introduction and setup</span><span class="text-muted">15 min</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span class="me-auto ms-2">Routing basics</span><span class="text-muted">30 min</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span class="me-auto ms-2">Controllers and requests</span><span class="text-muted">40 min</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span class="me-auto ms-2">Blade templates</span><span class="text-muted">45 min</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span class="me-auto ms-2">Eloquent models</span><span class="text-muted">50 min</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span class="me-auto ms-2">Migrations and seeders</span><span class="text-muted">40 min</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span class="me-auto ms-2">Relationships</span><span class="text-muted">55 min</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span class="me-auto ms-2">Forms and validation</span><span class="text-muted">50 min</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span class="me-auto ms-2">Authentication with Jetstream</span><span class="text-muted">60 min</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span class="me-auto ms-2">Livewire components</span><span class="text-muted">65 min</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span class="me-auto ms-2">Testing basics</span><span class="text-muted">35 min</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span class="me-auto ms-2">Deploying your app</span><span class="text-muted">45 min</span>
        </li>
    </ol>
  </div>

  <!-- Enrolled students -->
  <div class="card shadow-sm">
    <div class="card-header bg-white d-flex flex-wrap justify-content-between align-items-center gap-2">
      <span class="fw-semibold">Enrolled students <span class="text-muted fw-normal">(8,250)</span></span>
      <input type="text" class="form-control" style="max-width:260px;" placeholder="Search student">
    </div>
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr><th>#</th><th>Student</th><th>Email</th><th>Enrolled on</th></tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>
              <div class="d-flex align-items-center gap-3">
                <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width:36px;height:36px;font-size:14px;">RA</div>
                <span>Rafiq Ahmed</span>
              </div>
            </td>
            <td>rafiq@example.com</td>
            <td>02 Oct 2026</td>
          </tr>
          <tr>
            <td>2</td>
            <td>
              <div class="d-flex align-items-center gap-3">
                <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width:36px;height:36px;font-size:14px;">SI</div>
                <span>Sadia Islam</span>
              </div>
            </td>
            <td>sadia@example.com</td>
            <td>05 Oct 2026</td>
          </tr>
          <tr>
            <td>3</td>
            <td>
              <div class="d-flex align-items-center gap-3">
                <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width:36px;height:36px;font-size:14px;">MH</div>
                <span>Mehedi Hasan</span>
              </div>
            </td>
            <td>mehedi@example.com</td>
            <td>11 Oct 2026</td>
          </tr>
          <tr>
            <td>4</td>
            <td>
              <div class="d-flex align-items-center gap-3">
                <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width:36px;height:36px;font-size:14px;">TR</div>
                <span>Tasnim Rahman</span>
              </div>
            </td>
            <td>tasnim@example.com</td>
            <td>18 Oct 2026</td>
          </tr>
          <tr>
            <td>5</td>
            <td>
              <div class="d-flex align-items-center gap-3">
                <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width:36px;height:36px;font-size:14px;">AC</div>
                <span>Arif Chowdhury</span>
              </div>
            </td>
            <td>arif@example.com</td>
            <td>24 Oct 2026</td>
          </tr>
          <tr>
            <td>6</td>
            <td>
              <div class="d-flex align-items-center gap-3">
                <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width:36px;height:36px;font-size:14px;">MS</div>
                <span>Mim Sultana</span>
              </div>
            </td>
            <td>mim@example.com</td>
            <td>01 Nov 2026</td>
          </tr>
          <tr>
            <td>7</td>
            <td>
              <div class="d-flex align-items-center gap-3">
                <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width:36px;height:36px;font-size:14px;">SH</div>
                <span>Shakib Hossain</span>
              </div>
            </td>
            <td>shakib@example.com</td>
            <td>09 Nov 2026</td>
          </tr>
          <tr>
            <td>8</td>
            <td>
              <div class="d-flex align-items-center gap-3">
                <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width:36px;height:36px;font-size:14px;">LK</div>
                <span>Lamia Khan</span>
              </div>
            </td>
            <td>lamia@example.com</td>
            <td>14 Nov 2026</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="card-footer bg-white d-flex justify-content-between align-items-center">
      <small class="text-muted">Showing 1 to 8 of 8,250</small>
      <nav>
        <ul class="pagination pagination-sm mb-0">
          <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </nav>
    </div>
  </div>
</x-layouts::teacher>