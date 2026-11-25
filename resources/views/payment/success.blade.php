<x-layouts::app>
    @php
    $isPaid    = $order->status ===\App\Enum\OrderStatus::Paid;
    $isPending = $order->status ===\App\Enum\OrderStatus::Pending;
@endphp

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- Status banner --}}
            @if ($isPaid)
                <div class="text-center mb-4">
                    <div class="display-4 text-success">✓</div>
                    <h2 class="fw-bold">Payment successful</h2>
                    <p class="text-muted">Thank you! You are now enrolled in this course.</p>
                </div>
            @elseif ($isPending)
                <div class="text-center mb-4">
                    <div class="spinner-border text-warning mb-3" role="status"></div>
                    <h2 class="fw-bold">Payment is being confirmed</h2>
                    <p class="text-muted">
                        This usually takes a few seconds. Click refresh to check again.
                    </p>
                    <a href="{{ url()->full() }}" class="btn btn-warning">
                        Refresh status
                    </a>
                </div>
            @else
                <div class="alert alert-danger text-center">
                    Something went wrong with this payment
                    (status: {{ $order->status }}).
                    Please contact support if you were charged.
                </div>
            @endif

            {{-- Course info --}}
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white fw-semibold">Course</div>
                <div class="card-body">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $course->thumbnail) }}"
                                 class="img-fluid rounded"
                                 alt="{{ $course->title }}">
                        </div>
                        <div class="col-md-8">
                            <h5 class="mb-1">{{ $course->title }}</h5>
                            <p class="text-muted small mb-0">
                                {{ $course->level }} &middot; {{ $course->duration }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Payment info --}}
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white fw-semibold">Payment details</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between">
                        <span class="text-muted">Order #</span>
                        <span>{{ $order->id }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span class="text-muted">Amount</span>
                        <span class="fw-semibold">${{ number_format($order->amount, 2) }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span class="text-muted">Email</span>
                        <span>{{ auth()->user()->email }}</span>
                    </li>
                    @if ($isPaid && $order->stripe_payment_intent_id)
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="text-muted">Transaction ID</span>
                            <span class="small text-break">{{ $order->stripe_payment_intent_id }}</span>
                        </li>
                    @endif
                    <li class="list-group-item d-flex justify-content-between">
                        <span class="text-muted">Status</span>
                        <span>
                            @if ($isPaid)
                                <span class="badge bg-success">Paid</span>
                            @elseif ($isPending)
                                <span class="badge bg-warning text-dark">Pending</span>
                            @else
                                <span class="badge bg-danger">{{ ucfirst($order->status) }}</span>
                            @endif
                        </span>
                    </li>
                </ul>
            </div>

            {{-- Actions --}}
            <div class="d-flex gap-2 justify-content-center">
                @if ($isPaid)
                    <a href="{{ route('course-details', $course->slug) }}" class="btn btn-primary">
                        Start learning
                    </a>
                @endif
                <a href="{{ url('/') }}" class="btn btn-outline-secondary">Back to home</a>
            </div>

        </div>
    </div>
</div>
</x-layouts::app>