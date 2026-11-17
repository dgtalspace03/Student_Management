<x-layouts::admin>
    <div class="py-2" style="max-width: 900px;">

        <a href="{{ route('admin-course') }}" class="text-decoration-none">&larr; Back to courses</a>

        <!-- Course summary -->
        <div class="d-flex align-items-center gap-3 mt-3 mb-4">
            <img src="https://placehold.co/600x400/dc3545/ffffff?text=Laravel" alt="" width="96"
                class="rounded">
            <div>
                <h2 class="h2 mb-1">Laravel for Beginners</h2>
                <span class="badge text-bg-primary">Backend</span>
                <span class="text-muted ms-2">8,250 students enrolled</span>
            </div>
        </div>

        <div class="row g-4">

            <!-- Assigned teachers -->
            <div class="col-lg-7">
                <div class="card shadow-sm">
                    <div class="card-header bg-white fw-semibold">Assigned teachers</div>
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                    style="width:40px;height:40px;">AR</div>
                                <div>
                                    <div>Ayesha Rahman</div>
                                    <small class="text-muted">ayesha@example.com</small>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#removeModal" data-name="Ayesha Rahman">Remove</button>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                    style="width:40px;height:40px;">TH</div>
                                <div>
                                    <div>Tanvir Hossain</div>
                                    <small class="text-muted">tanvir@example.com</small>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#removeModal" data-name="Tanvir Hossain">Remove</button>
                        </li>

                        <!-- Empty state: show this when no teacher is assigned -->
                        <!--
          <li class="list-group-item text-center text-muted py-4">No teacher assigned yet.</li>
          -->

                    </ul>
                </div>
            </div>

            <!-- Assign new teacher -->
            <div class="col-lg-5">
                <!-- Dummy: Assign just reloads this page -->
                <form action="admin-course-teachers.html" class="card shadow-sm">
                    <div class="card-header bg-white fw-semibold">Assign new teacher</div>
                    <div class="card-body">
                        <label class="form-label" for="teacher">Teacher</label>
                        <select id="teacher" class="form-select" required>
                            <option value="" selected disabled>Select a teacher</option>
                            <option>Nusrat Jahan</option>
                            <option>Imran Khan</option>
                            <option>Farhana Akter</option>
                        </select>
                        <div class="form-text">Teachers already assigned to this course are not listed.</div>
                    </div>
                    <div class="card-footer bg-white">
                        <button type="submit" class="btn btn-success w-100">Assign teacher</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</x-layouts::admin>
