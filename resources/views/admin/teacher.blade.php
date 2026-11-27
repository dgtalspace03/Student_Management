<x-layouts::admin>



    <div class="py-2">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h2 mb-0">Manage teachers</h2>
            <a href="{{ route('admin-teacher-create') }}" class="btn btn-primary">Add teacher</a>
        </div>

        <livewire:admin.users target="teacher"/>

    </div>
</x-layouts::admin>
