<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Enum\OrderStatus;
use Livewire\WithPagination;
use App\Models\Order;
new class extends Component {
    use WithPagination;
    public string $selected_status = '';
    public string $type = '';
    public function mount(string $type): void
    {
        $this->type = $type;
    }

    #[Computed]
    public function orders()
    {
        if ($this->type == 'student') {
            return auth()->user()->my_orders()->when($this->selected_status, fn($q) => $q->where('status', $this->selected_status))->orderBy('created_at', 'desc')->paginate(10);
        }
        return Order::query()->when($this->selected_status, fn($q) => $q->where('status', $this->selected_status))->orderBy('created_at', 'desc')->paginate(10);
    }

    public function clear()
    {
        $this->selected_status = '';
    }
};
?>

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Orders</h4>

    </div>

    {{-- Filter --}}
    <div class="row g-2 mb-3">
        <div class="col-auto">
            <select name="status" class="form-select" wire:model.live="selected_status">
                <option value="">All statuses</option>
                @foreach (OrderStatus::cases() as $status)
                    <option value="{{ $status->value }}" @selected(request('status') === $status->value)>
                        {{ ucfirst(str_replace('_', ' ', $status->value)) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-auto">
            <button wire:click="clear" class="btn btn-outline-secondary">Clear</button>
        </div>

    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Order Id</th>
                        @if ($this->type == 'admin')
                            <th>Student</th>
                        @endif
                        <th>Course</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Transaction</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->orders as $order)
                        @php
                            $badge = match ($order->status) {
                                \App\Enum\OrderStatus::Paid => 'bg-success',
                                \App\Enum\OrderStatus::Pending => 'bg-warning text-dark',

                                default => 'bg-danger',
                            };
                        @endphp
                        <tr>
                            <td class="text-center">{{ $order->id }}</td>
                            @if ($this->type == 'admin')
                                <td>
                                    <div class="fw-semibold">{{ $order->user?->name ?? 'Deleted user' }}</div>
                                    <div class="text-muted small">{{ $order->user?->email }}</div>
                                </td>
                            @endif
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

    <div class="mt-3">
        {{ $this->orders->links('livewire::bootstrap') }}
    </div>

</div>
