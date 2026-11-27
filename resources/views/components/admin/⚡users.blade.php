<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Roles;
new class extends Component {
    use WithPagination;
    public string $target = '';
    public string $search='';
    public function mount(string $target): void
    {
        $this->target = $target;
    }
    #[Computed]
    public function users()
    {
        $role = Roles::where('slug', $this->target)->firstOrFail();
        return User::where('role_id', $role->id)
        ->when($this->search,fn($q)=>$q->where(fn($c)=>
        $c->where('name','like',"%$this->search%")
          ->orWhere('email','like',"%$this->search%")))
        ->paginate(10);
    }
};
?>

<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center gap-2">
        <span class="fw-semibold">All {{ $this->target }} <span class="text-muted fw-normal">({{ $this->users->count() }})</span></span>
        <input type="text" class="form-control form-control-sm" style="max-width:200px;" placeholder="Search {{ $this->target }}"
            wire:model.live.debounce.300ms="search">
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Joined</th>
                    <th>
                        @if ($this->target == 'teacher')
                            Course Assigned
                        @else
                            Course Enrolled
                        @endif
                    </th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($this->users as $user)
                    <tr>
                        <td>
                            <img style="height: 40px; width: 40px;" class=" rounded-circle object-cover"
                                src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />
                        </td>
                        <td>
                            <span>{{ $user->name }}</span>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                        <td>

                            @if ($this->target == 'teacher')
                                {{ $user->courses->count() }}
                            @else
                                {{ $user->enrolled_courses->count() }}
                            @endif
                            Courses
                        </td>
                        <td class="text-end">
                            @if ($this->target == 'teacher')
                                <form action="{{ route('admin-teacher-delete', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>


                                </form>
                            @else
                                <form action="{{ route('admin-student-toggle_status', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-sm
                                         {{ $user->status->value === 'activated' ? 'btn-outline-danger' : 'btn-outline-success' }}">
                                        {{ $user->status->value === 'activated' ? 'Deactive' : 'Active' }}
                                    </button>


                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <div>
                        No {{ $this->target }} found.
                    </div>
                @endforelse
            </tbody>
        </table>
    </div>
      <div class="mt-3 px-2">
            {{ $this->users->links('livewire::bootstrap') }}
        </div>
</div>
