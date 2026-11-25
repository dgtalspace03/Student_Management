
    <x-layouts::admin>
        <div class="container py-4">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Orders</h4>
                <div class="text-end">
                    <div class="text-muted small">Total revenue (paid)</div>
                    <div class="fw-bold fs-5 text-success">
                        ${{ number_format($total_revenue / 100, 2) }}
                    </div>
                </div>
            </div>

            {{-- Filter --}}
            <form method="GET" class="row g-2 mb-3">
                <div class="col-auto">
                    <select name="status" class="form-select" onchange="this.form.submit()">
                        <option value="">All statuses</option>
                        @foreach ($statuses as $status)
                            <option value="{{ $status->value }}" @selected(request('status') === $status->value)>
                                {{ ucfirst(str_replace('_', ' ', $status->value)) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @if (request('status'))
                    <div class="col-auto">
                        <a href="{{ route('admin-order') }}" class="btn btn-outline-secondary">Clear</a>
                    </div>
                @endif
            </form>

            <div class="card shadow-sm">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Order Id</th>
                                <th>Student</th>
                                <th>Course</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Transaction</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                @php
                                    $badge = match ($order->status) {
                                        \App\Enum\OrderStatus::Paid => 'bg-success',
                                        \App\Enum\OrderStatus::Pending => 'bg-warning text-dark',
                                        
                                        default => 'bg-danger',
                                    };
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $order->id }}</td>
                                    <td>
                                        <div class="fw-semibold">{{ $order->user?->name ?? 'Deleted user' }}</div>
                                        <div class="text-muted small">{{ $order->user?->email }}</div>
                                    </td>
                                    <td>{{ $order->course?->title ?? 'Deleted course' }}</td>
                                    <td>${{ number_format($order->amount / 100, 2) }}</td>
                                    <td>
                                        <span class="badge {{ $badge }}">
                                            {{ ucfirst(str_replace('_', ' ', $order->status->value)) }}
                                        </span>
                                    </td>
                                    <td class="small text-break" style="max-width: 180px;">
                                        {{ $order->stripe_payment_intent_id ?? '-' }}
                                    </td>
                                    <td class="small text-muted">
                                        {{ $order->created_at->format('d M Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">No orders found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- <div class="mt-3">
            {{ $orders->links('pagination::bootstrap-5') }}
        </div> --}}

        </div>
    </x-layouts::admin>
