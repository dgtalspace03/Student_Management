<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use App\Models\Categories;
use App\Models\Course;
new class extends Component {
    use WithPagination;
    public string $heading = '';
    public bool $isMyCourse = false;
    public string $search = '';

    public string $category_id = '';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedCategoryId(): void
    {
        $this->resetPage();
    }

    public function mount(string $heading, bool $isMyCourse): void
    {

        $this->heading = $heading;
        $this->isMyCourse = $isMyCourse;
    }
    #[Computed]
    public function categories()
    {
        $category = Categories::all();

        return $category;
    }

    #[Computed]
    public function courses()
    {
        $user=auth()->user();
        if (!$this->isMyCourse) {
            $all_course = Course::query()
            ->when($this->category_id, fn($q) => $q->where('category_id', $this->category_id))
            ->when($this->search, fn($q) => $q->where(fn($sub) => $sub->where('title', 'like', "%$this->search%")
            ->orWhere('description', 'like', "%$this->search%")))
            ->whereDoesntHave('students',function ($q) use ($user){
            $q->where('user_id',$user->id);
            })->paginate(10);
            return $all_course;
        }
        return auth()->user()->enrolled_courses()
        ->when($this->category_id, fn($q) => $q->where('category_id', $this->category_id))
        ->when($this->search, fn($q) => $q->where(fn($sub) => $sub->where('title', 'like', "%$this->search%")
        ->orWhere('description', 'like', "%$this->search%")))
        ->paginate(2);
    }
};
?>

<div>
    <div class="d-flex container align-items-center justify-content-between mt-5">
        <h2 class="h2">{{ $heading }}</h2>
        <div class="d-flex align-items-center justify-content-center gap-3">
            <input type="text" class="form-control" placeholder="Search Course" wire:model.live.debounce.300ms="search">

            <select class="form-control" wire:model.live="category_id">
                <option value="">All</option>
                @foreach ($this->categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="container d-flex align-items-center gap-3 flex-wrap mt-3">
        @forelse ($this->courses as $course)
            <div wire:key="{{ $course['slug'] }}">

                <x-app.course-card slug="{{ $course->slug }}" title="{{ $course->title }}"
                    description="{{ $course->description }}" img="/storage/{{ $course->thumbnail }}"
                    price="{{ $course->price }}" category="{{ $course->category->name }}"
                    enrolled="{{ $course->students->count() }}" :isMyCourse="$isMyCourse" />
            </div>
        @empty
            <p class="text-muted">No courses found.</p>
        @endforelse
    
    </div>
      <div class="mt-3 container">
      {{ $this->courses->links('livewire::bootstrap') }}
    </div>
</div>
