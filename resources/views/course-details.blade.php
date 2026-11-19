<x-layouts::app>
    <div class="container py-5">
        <div class="row g-4">

            <!-- Left: main content -->
            <div class="col-lg-8">
                <!-- Thumbnail -->
                <img src="/storage/{{ $course->thumbnail }}" class="img-fluid rounded mb-4 w-100" alt="Course thumbnail">

                <!-- Title & description -->
                <h1 class="fw-bold mb-3">{{ $course->title }}</h1>
                <p class="text-muted">
                    {{ $course['description'] }}
                </p>

                <!-- Curriculum: one lesson = one database row -->
                <h4 class="mt-5 mb-3">Curriculum</h4>
                <ol class="list-group list-group-numbered">

                    @forelse ($course->lessons as $lesson)
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="me-auto ms-2">{{ $lesson->title }}</span>
                            <span class="text-muted">{{ $lesson->duration }} min</span>
                        </li>
                    @empty
                        <div class="card-body text-center text-muted py-4">No lessons added yet.</div>
                    @endforelse

                </ol>
            </div>

            <!-- Right: price, enrolled, teacher -->
            <div class="col-lg-4">
                <div class="card shadow-sm sticky-lg-top" style="top: 1rem;">
                    <div class="card-body">
                        <h2 class="fw-bold text-primary mb-0">${{ $course->price }}<small
                                class="text-muted text-decoration-line-through fs-6">${{ $course->original_price }}</small>
                        </h2>
                        <button class="btn btn-primary w-100 my-3">Enroll now</button>

                        <ul class="list-unstyled mb-0">
                            <li class="d-flex justify-content-between py-2 border-bottom">
                                <span class="text-muted">Students enrolled</span><strong>{{ 0 }}</strong>
                            </li>
                            <li class="d-flex justify-content-between py-2 border-bottom">
                                <span class="text-muted">Duration</span><strong>
                                    @if ($hour > 0)
                                        {{ $hour }} hours
                                    @endif
                                    @if ($minute > 0)
                                        {{ $minute }} minutes
                                    @endif
                                </strong>
                            </li>
                            <li class="d-flex justify-content-between py-2 border-bottom">
                                <span class="text-muted">Level</span><strong>Beginner</strong>
                            </li>
                        </ul>

                        <!-- Teacher -->
                        <div>
                            <h2 class="h3 mt-2">Teachers</h2>
                            @forelse ($course->all_assigned_course as $assaign)
                                <div class="d-flex align-items-center mt-3 gap-2">
                                    <img style="height: 48px; width: 48px;" class=" rounded-circle object-cover"
                                        src="{{ $assaign->teacher->profile_photo_url }}"
                                        alt="{{ $assaign->teacher->name }}" />
                                    <div>
                                        <div class="fw-semibold">{{ $assaign->teacher->name }}</div>
                                        <small class="text-muted">{{ $assaign->teacher->email }}</small>
                                    </div>
                                </div>
                        </div>
                    @empty
                        <p class="text-center">No Teacher Has been assigned to the course.</p>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</x-layouts::app>
