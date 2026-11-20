<x-layouts::admin>

    <div class=" py-1" style="max-width: 820px;">

        <a href="{{ route('admin-course') }}" class="text-decoration-none">&larr; Back to courses</a>
        <h2 class="h2 mt-2 mb-4">Edit course</h2>

        <!-- Dummy: Save just goes back to the list page -->
        <form action="{{ route('admin-course-edit-post',$course->slug) }}" method="POST" class="card shadow-sm"
            enctype="multipart/form-data">
            @csrf
            <div class="card-body row g-3">

                <div class="col-12">
                    <label class="form-label" for="title">Title</label>
                    <input type="text" value="{{ $course->title }}" id="title" name="title"
                        class="form-control @error('title') is-invalid @enderror" required>
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-12">
                    <label class="form-label" for="description">Description</label>
                    <textarea id="description"  name="description" rows="4"
                        class="form-control @error('description') is-invalid @enderror"
                         required>{{ $course->description }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="category">Category</label>
                    <Select class="form-control @error('category') is-invalid @enderror" name="category">
                        @foreach ($all_categories as $category)
                            <Option @selected($course->category->slug==$category->slug) value="{{ $category->slug }}">{{ $category->name }}</Option>
                        @endforeach
                    </Select>
                    @error('category')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="level">Level</label>
                    <Select class="form-control @error('level') is-invalid @enderror" name="level">
                        @foreach (['Beginner', 'Intermediate', 'Advance'] as $level)
                            <Option  @selected($course->level ==$level)  value="{{ $level }}">{{ $level }}</Option>
                        @endforeach
                    </Select>
                    @error('level')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="price">Price</label>
                    <input type="number" value="{{ $course->price}}" name="price" step="0.01" min="0" id="price"
                        class="form-control @error('price') is-invalid @enderror" value="0" required>
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="original_price">Original Price</label>
                    <input type="number" value="{{ $course->original_price }}" name="original_price" step="0.01" min="0" id="price"
                        class="form-control @error('original_price') is-invalid @enderror" value="0" required>
                    @error('original_price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>



                <div class="col-12">
                    <label class="form-label" for="img">Image URL</label>
                    <input type="file" name="thumbnail" id="img"
                        class="form-control @error('thumbnail') is-invalid @enderror" accept="image/*">
                    @error('thumbnail')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>



            </div>
            <div class="card-footer bg-white d-flex gap-2">
                <button type="submit" class="btn btn-success">Edit course</button>
                <a href="{{ route('admin-course') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>

    </div>
</x-layouts::admin>
