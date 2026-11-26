<x-layouts::admin>


    <div class="py-2">

        <div class="mb-4">
            <h2 class="h2 mb-0">Manage categories</h2>
            <small class="text-muted">Categories are shared by all courses and used in the filters.</small>
        </div>

        <div class="row g-4">

            <!-- Category list -->
            <livewire:admin.category />

            <!-- Add category -->
            <div class="col-lg-4">

                <form action="{{ route('admin-categories-create') }}" class="card shadow-sm" method="POST">
                    @csrf
                    <div class="card-header bg-white fw-semibold">Add category</div>
                    <div class="card-body">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" id="name"
                            class="form-control @error('name') is-invalid @enderror" maxlength="100" required>
                        <div class="form-text">The slug is created automatically from the name.</div>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        @error('slug')
                            <div class="text-danger small mt-2">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="card-footer bg-white">
                        <button type="submit" class="btn btn-success w-100">Add category</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</x-layouts::admin>
