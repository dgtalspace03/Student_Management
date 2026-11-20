<x-layouts::admin>


    <div class="py-2">

        <div class="mb-4">
            <h2 class="h2 mb-0">Manage categories</h2>
            <small class="text-muted">Categories are shared by all courses and used in the filters.</small>
        </div>

        <div class="row g-4">

            <!-- Category list -->
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center gap-2">
                        <span class="fw-semibold">All categories <span class="text-muted fw-normal">(10)</span></span>
                        <input type="text" class="form-control form-control-sm" style="max-width:200px;"
                            placeholder="Search category">
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
                                @foreach ($all_categories as $category)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{ $category->name }}</td>
                                        <td class="text-muted">{{ $category->slug }}</td>
                                        <td><span class="badge text-bg-secondary">{{ count($category->courses) }} courses</span></td>
                                        <td class="text-end d-flex align-items-center justify-content-end gap-2">
                                            
                                            <form action="{{ route('admin-categories-delete',$category->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger" >Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <!-- Empty state: show this when there are no categories -->
                    <!--
        <div class="card-body text-center text-muted py-4">No categories yet.</div>
        -->
                </div>
            </div>

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
