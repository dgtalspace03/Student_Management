<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Categories;
use Livewire\WithPagination;
new class extends Component {
     use WithPagination;
    public string $search="";
    #[Computed]
    public function all_categories()
    {
        return Categories::query()
        ->when($this->search,fn($q)=>$q->where('name','like',"%$this->search%"))
        ->paginate(10);
    }
};
?>

<div class="col-lg-8">
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center gap-2">
            <span class="fw-semibold">All categories <span class="text-muted fw-normal">(10)</span></span>
            <input type="text" class="form-control form-control-sm" style="max-width:200px;"
                placeholder="Search category" wire:model.live.debounce.300ms="search">
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Used by</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->all_categories as $category)
                        <tr>

                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td class="text-muted">{{ $category->slug }}</td>
                            <td><span class="badge text-bg-secondary">{{ count($category->courses) }} courses</span>
                            </td>
                            <td class="text-end d-flex align-items-center justify-content-end gap-2">

                                <form action="{{ route('admin-categories-delete', $category->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <h3 class="card-body text-center text-muted py-4 h3">No categories yet.</h3>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

         <div class="mt-3 px-2">
            {{ $this->all_categories->links('livewire::bootstrap') }}
        </div>
    </div>
    
</div>
