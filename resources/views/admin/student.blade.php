<x-layouts::admin>
   <div class="py-2">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h2 mb-0">Manage Student</h2>
            
        </div>
        <livewire:admin.users target="student"/>
        {{-- <div class="card shadow-sm">
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

                        @forelse ($students as $student)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <img style="height: 40px; width: 40px;" class=" rounded-circle object-cover" src="{{$student->profile_photo_url }}" alt="{{ $student->name }}" />
                                        
                                        <span>{{$student->name}}</span>
                                    </div>
                                </td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->created_at->format('d M Y')}}</td>
                                <td class="text-end">
                                    <form action="{{ route('admin-student-toggle_status',$student->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm
                                         {{ $student->status->value === 'activated' ? 'btn-outline-danger' : 'btn-outline-success' }}" >
                                        {{ $student->status->value === 'activated' ? "Deactive" : "Active" }}
                                        </button>


                                    </form>
                                </td>
                            </tr>
                        @empty
                        <div>
                            No Student Found.
                        </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div> --}}

    </div>
</x-layouts::admin>
