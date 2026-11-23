<x-layouts::admin>
    <div class="py-2" style="max-width: 900px;">

        <a href="{{ route('admin-course') }}" class="text-decoration-none">&larr; Back to courses</a>

        <!-- Course summary -->
        <div class="d-flex align-items-center gap-3 mt-3 mb-4">
            <img src="/storage/{{ $course->thumbnail }}" alt="" width="96" class="rounded">
            <div>
                <h2 class="h2 mb-1">{{ $course->title }}</h2>
                <span class="badge text-bg-primary">{{ $course->category->name }}</span>
                <span class="text-muted ms-2">8,250 students enrolled</span>
            </div>
        </div>

        <div class="row g-4">

            <!-- Assigned teachers -->
            <div class="col-lg-7">
                <div class="card shadow-sm">
                    <div class="card-header bg-white fw-semibold">Assigned teachers</div>
                    <ul class="list-group list-group-flush">

                        @forelse ($course->teachers as $teacher)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center gap-3">
                                    <img style="height: 40px; width: 40px;" class=" rounded-circle object-cover"
                                        src="{{ $teacher->profile_photo_url }}"
                                        alt="{{ $teacher->name }}" />

                                    <div>
                                        <div>{{ $teacher->name }}</div>
                                        <small class="text-muted">{{ $teacher->email }}</small>
                                    </div>
                                </div>
                                <form
                                    action="{{ route('admin-course-teacher-remove', [$course->id, $teacher->id]) }}"
                                    method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Remove</button>
                                </form>
                            </li>

                        @empty
                            <li class="list-group-item text-center text-muted py-4">No teacher assigned yet.</li>
                        @endforelse


                    </ul>
                </div>
            </div>


            <div class="col-lg-5">

                <form action="{{ route('admin-course-teacher-assign', $course->id) }}" class="card shadow-sm"
                    method="POST">
                    @csrf
                    <div class="card-header bg-white fw-semibold">Assign new teacher</div>
                    <div class="card-body">
                        <label class="form-label" for="teacher">Teacher</label>
                        <select id="teacher" class="form-select" required name="teacher_id">
                            <option value="" selected disabled>Select a teacher</option>
                            @foreach ($unassigned_teacher as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach

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
