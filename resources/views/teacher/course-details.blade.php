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
   <livewire:teacher.enrolled-students :id="$course->id" />
</x-layouts::teacher>
