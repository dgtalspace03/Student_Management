<?php

use Livewire\Component;
use App\Models\Enrollment;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;
new class extends Component
{
     use WithPagination;
    //  protected string $paginationTheme = 'bootstrap';
    public string $search="";
    public string $course_id="";
    public function clear():void{
        $this->search="";
        $this->course_id="";
    }
    #[Computed]
   public function enrollments(){
    $search=$this->search;
    return Enrollment::query()
    ->when($this->course_id,fn($q)=>$q->where('course_id',$this->course_id))
    ->when($this->search,fn($q)=>$q->whereHas('course',function ($c) use ($search){
    $c->where('title','like',"%$search%");
    }))
   

    ->orderBy('created_at','desc')->paginate(10);
   }
    #[Computed]
   public function all_enrollment(){
    return Enrollment::all();

    
   }

};
?>

<div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Enrollments</h4>
            <div class="text-end">
                <div class="text-muted small">Total enrollments</div>
                <div class="fw-bold fs-5">{{ $this->enrollments->count() }}</div>
            </div>
        </div>

        {{-- Filters --}}
        <div class="row g-2 mb-3 ">
            <div class="col-md-8">
                <input type="text" name="search" wire:model.live.debounce.300ms="search"
                       class="form-control" placeholder="Search student name or email">
            </div>
            <div class="col-md-3">
                <select name="course_id" class="form-select" wire:model.live="course_id">
                    <option value="">All courses</option>
                    @foreach ($this->all_enrollment as $enrollment)
                        <option value="{{ $enrollment->course->id }}" @selected(request('course_id') == $enrollment->course->id)>
                            {{ $enrollment->course->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <button wire:click="clear" class="btn btn-primary">Clear</button>
            </div>
        </div>

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
                        @forelse ($this->enrollments as $enrollment)
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

        <div class="mt-3">
            {{ $this->enrollments->links('livewire::bootstrap') }}
        </div>

    </div>