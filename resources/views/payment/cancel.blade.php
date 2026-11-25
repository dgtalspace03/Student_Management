<x-layouts::app>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">

                <div class="card shadow-sm text-center">
                    <div class="card-body p-4">

                        <div class="display-4 text-danger mb-2">✕</div>
                        <h4 class="fw-bold">Payment cancelled</h4>
                        <p class="text-muted">
                            You cancelled the payment. No money was charged.
                        </p>

                        @if (!empty($course))
                            <p class="mb-3">
                                <span class="text-muted">Course:</span>
                                <strong>{{ $course->title }}</strong>
                            </p>
                        @endif

                        <div class="d-flex gap-2 justify-content-center">
                            @if (!empty($course))
                                <a href="{{ route('course-details', $course->slug) }}" class="btn btn-primary">
                                    Try again
                                </a>
                            @endif
                            <a href="{{ url('/') }}" class="btn btn-outline-secondary">
                                Back to home
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts::app>