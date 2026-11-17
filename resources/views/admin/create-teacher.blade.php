<x-layouts::admin>

    <div class="py-2" style="max-width: 720px;">

        <a href="{{ route('admin-teacher') }}" class="text-decoration-none">&larr; Back to teachers</a>
        <h2 class="h2 mt-2 mb-4">Add teacher</h2>

        <!-- Dummy: Create just goes back to the list page -->
        <form action="admin-teachers-ui.html" class="card shadow-sm">
            <div class="card-body row g-3">

                <div class="col-md-6">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" id="name" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" id="email" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" class="form-control" minlength="8" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="password_confirmation">Confirm password</label>
                    <input type="password" id="password_confirmation" class="form-control" minlength="8" required>
                </div>

            </div>
            <div class="card-footer bg-white d-flex gap-2">
                <button type="submit" class="btn btn-success">Create teacher</button>
                <a href="admin-teachers-ui.html" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>

    </div>

</x-layouts::admin>
