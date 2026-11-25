<x-layouts::teacher>
    <a href="{{ route('teacher') }}" class="text-decoration-none">&larr; Back to my courses</a>

    <!-- Course details -->
    <div class="card shadow-sm mt-3 mb-4">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/storage/{{ $course->thumbnail }}" class=" rounded-start w-100 h-100" style="object-fit:cover;"
                    alt="">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <span class="badge text-bg-primary mb-2">{{ $course->category->name }}</span>
                    <h2 class="h2">{{ $course->title }}</h2>
                    <p class="text-muted">{{ $course->description }}</p>
                    <div class="row text-center g-2 mt-3">
                        <div class="col-4">
                            <div class="border rounded py-2">
                                <div class="fw-bold fs-5">{{ $course->students->count() }}</div><small
                                    class="text-muted">Students</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="border rounded py-2">
                                <div class="fw-bold fs-5">${{ $course->price }}</div><small
                                    class="text-muted">Price</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="border rounded py-2">
                                <div class="fw-bold fs-5">{{ count($course->lessons) }}</div><small
                                    class="text-muted">Lessons</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lessons -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white fw-semibold">
            Lessons <span class="text-muted fw-normal">({{ count($course->lessons) }} lessons, {{ $hour }} hours
                {{ $minute }} min)</span>
        </div>
        <ol class="list-group list-group-flush list-group-numbered">
            @forelse ($course->lessons as $lesson)
                <li class="list-group-item d-flex justify-content-between">
                    <span class="me-auto ms-2">{{ $lesson->title }}</span><span
                        class="text-muted">{{ $lesson->duration }} min</span>
                </li>
            @empty
            @endforelse

        </ol>
    </div>

    <!-- Enrolled students -->
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex flex-wrap justify-content-between align-items-center gap-2">
            <span class="fw-semibold">Enrolled students <span
                    class="text-muted fw-normal">({{ $course->students->count() }})</span></span>
            <input type="text" class="form-control" style="max-width:260px;" placeholder="Search student">
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Email</th>
                        <th>Enrolled on</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($course->students as $student)
                        <tr>
                            <td>1</td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                      <img style="height: 36px; width: 36px;" class=" rounded-circle object-cover"
                                        src="{{$student->profile_photo_url }}"
                                        alt="{{ $student->name }}" />
                                    <span>{{$student->name}}</span>
                                </div>
                            </td>
                            <td>{{ $student->email }}</td>
                            <td>{{$student->pivot->created_at->format('d M Y')}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="my-2">
                                <h2 class="h2 text-center">No Student have enrolled yet</h2>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        {{-- <div class="card-footer bg-white d-flex justify-content-between align-items-center">
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
        </div> --}}
    </div>
</x-layouts::teacher>
