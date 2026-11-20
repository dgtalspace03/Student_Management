<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use Illuminate\Support\Str;
use App\Models\Categories;
use App\Models\Course;
new class extends Component
{
    public string $search = '';

    public string $category_id = '';

    #[Computed]
    public function categories()
    {
        $category= Categories::all();
        
        return $category;
    }

    #[Computed]
    public function courses()
    {
        $all_course=Course::query()
                            ->when($this->category_id,fn($q) => $q->where('category_id',$this->category_id ) )
                            ->when($this->search,fn($q) => 
                                    $q->where(fn($sub) => $sub
                                    ->where('title','like',"%$this->search%")
                                   ->orWhere('description','like',"%$this->search%")
                                    ))
                                    ->get();
        return $all_course;
    }
};
?>

<div>
    <div class="d-flex container align-items-center justify-content-between mt-5">
        <h2 class="h2">{{ __('home.all_courses') }}</h2>
        <div class="d-flex align-items-center justify-content-center gap-3">
            <input type="text" class="form-control" placeholder="Search Course" wire:model.live.debounce.300ms="search">

            <select class="form-control" wire:model.live="category_id">
                <option value="">All</option>
                @foreach ($this->categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
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
                    enrolled="{{ 0 }}" />
            </div>
        @empty
            <p class="text-muted">No courses found.</p>
        @endforelse
    </div>
</div>
