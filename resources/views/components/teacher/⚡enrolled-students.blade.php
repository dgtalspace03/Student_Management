<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Course;
use Livewire\WithPagination;
new class extends Component
{
    use WithPagination;
    public string $id="";
    public string $search="";
   
    public function mount(string $id): void
    {

        $this->id = $id;
       
    }
   #[Computed]
   public function students(){
    return Course::where('id',$this->id)->firstOrFail()->students()
    ->when($this->search,fn($q)=> $q->where(fn($sub)=>
    $sub->where('name','like',"%$this->search%")
        ->orWhere('email','like',"%$this->search%")
    ))
    ->paginate(10);
    
   }
};
?>

  <div class="card shadow-sm">
        <div class="card-header bg-white d-flex flex-wrap justify-content-between align-items-center gap-2">
            <span class="fw-semibold">Enrolled students <span
                    class="text-muted fw-normal">({{ $this->students->count() }})</span></span>
            <input type="text" wire:model.live.debounce.300ms="search"  class="form-control" style="max-width:260px;" placeholder="Search student">
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Email</th>
                        <th>Enrolled on</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->students as $student)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                      <img style="height: 36px; width: 36px;" class=" rounded-circle object-cover"
                                        src="{{$student->profile_photo_url }}"
                                        alt="{{ $student->name }}" />
                                    <span>{{$student->name}}</span>
                                </div>
                            </td>
                            <td>{{ $student->email }}</td>
                            <td>{{$student->pivot->created_at->format('d M Y')}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="my-2">
                                <h2 class="h2 text-center">No Student have enrolled yet</h2>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
       <div class="mt-3 container">
      {{ $this->students->links('livewire::bootstrap') }}
    </div>
    </div>