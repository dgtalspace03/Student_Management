<x-layouts::teacher>


    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h2 mb-0">My courses</h2>
            <small class="text-muted">Courses assigned to you</small>
        </div>
        <span class="badge text-bg-secondary fs-6">{{ count($teacher->all_assigned_course) }} courses</span>
    </div>

    <div class="row g-4">
        @forelse ($teacher->all_assigned_course as $assign)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <img src="/storage/{{ $assign->course->thumbnail }}" class="card-img-top" alt="">
                    <div class="card-body d-flex flex-column">
                        <span class="badge text-bg-primary align-self-start mb-2">
                          {{$assign->course->category->name}}
                        </span>
                        <h5 class="card-title title" >{{$assign->course->title}}</h5>
                        <p class="card-text text-muted small description">
                          {{ $assign->course->description }}
                        </p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <small class="text-muted">8,250 students</small>
                            <a href="{{ route('teacher-course-details', $assign->course->slug) }}" class="btn btn-sm btn-primary">View
                                details</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse

    </div>

    <!-- Empty state: show this when no course is assigned -->
    <!--
  <div class="text-center text-muted py-5">No courses have been assigned to you yet.</div>
  -->


</x-layouts::teacher>
