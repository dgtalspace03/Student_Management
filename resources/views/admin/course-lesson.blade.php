<x-layouts::admin>


    <div class="py-2" style="max-width: 960px;">

        <a href="{{ route('admin-course') }}" class="text-decoration-none">&larr; Back to courses</a>

        <!-- Course summary -->
        <div class="d-flex align-items-center gap-3 mt-3 mb-4">
            <img src="/storage/{{ $course->thumbnail }}" alt="" width="96" class="rounded">
            <div>
                <h2 class="h2 mb-1">{{ $course->title }}</h2>
                <span class="badge text-bg-primary">{{ $course->category->name }}</span>
                <span class="text-muted ms-2">8 lessons &middot; 5 hours 15 min</span>
            </div>
        </div>

        <div class="row g-4">

            <!-- Lessons list -->
            <div class="col-lg-7">
                <div class="card shadow-sm">
                    <div class="card-header bg-white fw-semibold">Lessons</div>
                    <ol class="list-group list-group-flush list-group-numbered">

                       
                        @forelse ($course->lessons as $index => $lesson)
                            <li class="list-group-item d-flex justify-content-between align-items-center">

                                <span class="me-auto ms-2">
                                    {{ $lesson->title }}
                                </span>

                                <span class="text-muted me-3">
                                    {{ $lesson->duration }} min
                                </span>

                                <div class="d-flex gap-1">

                                  
                                    <form action="{{ route('admin-course-lesson-up', [$course->id,$lesson->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-secondary"
                                            {{ $index === 0 ? 'disabled' : '' }}>
                                            <i class="bi bi-arrow-up"></i>
                                        </button>
                                    </form>

                                    <form action="{{ route('admin-course-lesson-down',  [$course->id,$lesson->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-secondary"
                                            {{ $index === $course->lessons->count() - 1 ? 'disabled' : '' }}>
                                            <i class="bi bi-arrow-down"></i>
                                        </button>
                                    </form>

                                    {{-- Remove --}}
                                   <form action="{{ route('admin-course-lesson-delete',$lesson->id) }}" method="POST">
                                    @csrf
                                     <button type="submit" class="btn btn-sm btn-outline-danger">
                                        Remove
                                    </button>
                                   </form>

                                </div>
                            </li>
                        @empty
                            <div class="card-body text-center text-muted py-4">
                                No lessons added yet.
                            </div>
                        @endforelse
                    


                    </ol>


                </div>
            </div>


            <div class="col-lg-5">

                <form action="{{ route('admin-course-lesson-create', $course->id) }}" class="card shadow-sm"
                    method="POST">
                    @csrf
                    <div class="card-header bg-white fw-semibold">Add lesson</div>
                    <div class="card-body row g-3">
                        <div class="col-12">
                            <label class="form-label" for="title">Lesson title</label>
                            <input type="text" id="title" name="title"
                                class="form-control @error('title') is-invalid @enderror" required>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="duration">Duration (minutes)</label>
                            <input type="number" name="duration" id="duration" min="1"
                                class="form-control @error('duration') is-invalid @enderror" required>
                            @error('duration')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
