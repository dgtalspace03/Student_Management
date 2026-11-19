
<x-layouts::admin>

    <div class="py-2" style="max-width: 720px;">

        <a href="{{ route('admin-teacher') }}" class="text-decoration-none">&larr; Back to teachers</a>
        <h2 class="h2 mt-2 mb-4">Add teacher</h2>

        <form action="{{ route('admin-teacher-create-post') }}" method="POST" class="card shadow-sm">
            @csrf

            <div class="card-body row g-3">

                {{-- Name --}}
                <div class="col-md-6">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}"
                        placeholder="Enter your name" required autocomplete="name">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="col-md-6">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}"
                        placeholder="Enter your email" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="col-md-6">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password" placeholder="Create a password"
                        required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="col-md-6">
                    <label class="form-label" for="password_confirmation">Confirm password</label>
                    <input type="password" id="password_confirmation"
                        class="form-control"
                        name="password_confirmation" placeholder="Enter password again"
                        required autocomplete="new-password">
                </div>

            </div>

            <div class="card-footer bg-white d-flex gap-2">
                <button type="submit" class="btn btn-success">Create teacher</button>
                <a href="{{ route('admin-teacher') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>

        </form>

    </div>

</x-layouts::admin>
