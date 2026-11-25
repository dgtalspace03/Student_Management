<x-layouts::admin>
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Enrollments</h4>
            <div class="text-end">
                <div class="text-muted small">Total enrollments</div>
                <div class="fw-bold fs-5">{{ $enrollments->count() }}</div>
            </div>
        </div>

        {{-- Filters --}}
        <form method="GET" class="row g-2 mb-3">
            <div class="col-md-4">
                <input type="text" name="search" value="{{ request('search') }}"
                       class="form-control" placeholder="Search student name or email">
            </div>
            <div class="col-md-4">
                <select name="course_id" class="form-select" onchange="this.form.submit()">
                    <option value="">All courses</option>
                    @foreach ($enrollments as $enrollment)
                        <option value="{{ $enrollment->course->id }}" @selected(request('course_id') == $enrollment->course->id)>
                            {{ $enrollment->course->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <button class="btn btn-primary">Search</button>
                @if (request('search') || request('course_id'))
                    <a href="{{ route('admin.enrollments') }}" class="btn btn-outline-secondary">Clear</a>
                @endif
            </div>
        </form>

        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Student</th>
                            <th>Course</th>
                            <th>Order</th>
                            <th>Amount paid</th>
                            <th>Enrolled on</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($enrollments as $enrollment)
                            <tr>
                                <td>{{ $enrollment->id }}</td>
                                <td>
                                    <div class="fw-semibold">{{ $enrollment->student?->name ?? 'Deleted user' }}</div>
                                    <div class="text-muted small">{{ $enrollment->user?->email }}</div>
                                </td>
                                <td>{{ $enrollment->course?->title ?? 'Deleted course' }}</td>
                                <td>
                                    @if ($enrollment->order)
                                        <a href="{{ route('admin-order', ['status' => $enrollment->order->status->value]) }}"
                                           class="text-decoration-none">
                                            #{{ $enrollment->order->id }}
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    {{ $enrollment->order ? '$' . number_format($enrollment->order->amount / 100, 2) : '-' }}
                                </td>
                                <td class="small text-muted">
                                    {{ $enrollment->created_at->format('d M Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No enrollments found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- <div class="mt-3">
            {{ $enrollments->links('pagination::bootstrap-5') }}
        </div> --}}

    </div>
</x-layouts::admin>