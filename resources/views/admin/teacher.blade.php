<x-layouts::admin>



    <div class="py-2">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h2 mb-0">Manage teachers</h2>
            <a href="{{ route('admin-teacher-create') }}" class="btn btn-primary">Add teacher</a>
        </div>

        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Added</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($all_teachers as $teacher)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <img style="height: 40px; width: 40px;" class=" rounded-circle object-cover"
                                            src="{{ $teacher->profile_photo_url }}" alt="{{ $teacher->name }}" />

                                        <span>{{ $teacher->name }}</span>
                                    </div>
                                </td>
                                <td>{{ $teacher->email }}</td>
                                <td>{{ $teacher->created_at->format('d M Y') }}</td>
                                <td class="text-end">
                                    <form action="{{ route('admin-teacher-delete', $teacher->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>


                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div>
                                No Teacher Found.
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-layouts::admin>
