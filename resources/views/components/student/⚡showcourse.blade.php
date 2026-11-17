<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use Illuminate\Support\Str;

new class extends Component
{
    public string $search = '';
    public string $category = 'all';

    #[Computed]
    public function categories(): array
    {
        return collect(config('constant.courses'))
            ->pluck('category')->unique()->sort()->values()->all();
    }

    #[Computed]
    public function courses()
    {
        return collect(config('constant.courses'))
            ->when($this->category !== 'all',
                fn ($c) => $c->where('category', $this->category))
            ->when($this->search !== '',
                fn ($c) => $c->filter(
                    fn ($course) => Str::contains($course['title'], $this->search, ignoreCase: true)
                ))
            ->values();
    }
};
?>

<div>
    <div class="d-flex container align-items-center justify-content-between mt-5">
        <h2 class="h2">{{ __('home.all_courses') }}</h2>
        <div class="d-flex align-items-center justify-content-center gap-3">
            <input type="text" class="form-control" placeholder="Search Course"
                   wire:model.live.debounce.300ms="search">

            <select class="form-control" wire:model.live="category">
                <option value="all">All</option>
                @foreach ($this->categories as $cat)
                    <option value="{{ $cat }}">{{ $cat }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="container d-flex align-items-center gap-3 flex-wrap mt-3">
        @forelse ($this->courses as $course)
            <div wire:key="{{ $course['slug'] }}">
                <x-app.course-card
                    slug="{{ $course['slug'] }}"
                    title="{{ $course['title'] }}"
                    description="{{ $course['description'] }}"
                    img="{{ $course['img'] }}"
                    price="{{ $course['price'] }}"
                    category="{{ $course['category'] }}"
                    enrolled="{{ $course['enrolled'] }}" />
            </div>
        @empty
            <p class="text-muted">No courses found.</p>
        @endforelse
    </div>
</div>