@props([
    'slug',
    'img',
    'title',
    'description',
    'category' => 'General',
    'price' => 0,
    'enrolled' => 0,
])

<div class="card h-100 shadow-sm" style="width: 15rem;">

    {{-- Image + category badge --}}
    <div class="position-relative">
        <img src="{{ $img }}" class="card-img-top title" alt="{{ $title }}">
        <span class="badge text-bg-primary position-absolute top-0 start-0 m-2">
            {{ $category }}
        </span>
    </div>

    <div class="card-body d-flex flex-column" style="height: 200px">
        <h5 class="card-title">{{ $title }}</h5>
        <p class="card-text text-secondary small description">{{ $description }}</p>

        {{-- Enrolled students --}}
        <div class="small text-secondary mb-3">
            👥 {{ number_format($enrolled) }} students enrolled
        </div>

        {{-- Price + button pinned to the bottom --}}
        <div class="mt-auto d-flex justify-content-between align-items-center">
            <span class="fs-5 fw-bold {{ $price > 0 ? 'text-dark' : 'text-success' }}">
                {{ $price > 0 ? '$' . number_format($price, 2) : 'Free' }}
            </span>
            <a href="{{ route('course-details',$slug) }}" class="btn btn-primary btn-sm">View Details</a>
        </div>
    </div>
</div>