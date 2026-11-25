<x-layouts::admin>

    <div class=" py-2">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h2 mb-0">Manage courses</h2>
            <a href="{{ route('admin-course-create') }}" class="btn btn-primary">Add course</a>
        </div>

        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Enrolled</th>
                            <th>Teachers</th>
                            <th>Lesson</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($all_courses as $course)
                            <tr>
                                <td><img src="/storage/{{ $course->thumbnail }}"
                                        alt="" width="64" class="rounded"></td>
                                <td>{{$course->title}}</td>
                                <td>{{ $course->category->name }}</td>
                                <td>${{$course->price}}</td>
                                <td>{{$course->students->count()}}</td>
                                <td><a class="btn btn-secondary" href="{{ route('admin-course-teacher', $course->slug) }}">Manage</a>
                                <td><a class="btn btn-secondary" href="{{ route('admin-course-lesson', $course->slug) }}">Manage</a>
                                </td>
                                <td class="text-end">
                                    <a  href="{{ route('admin-course-edit',$course->slug) }}" class="btn btn-sm btn-outline-primary" >Edit</a>
                                    <button class="btn btn-sm btn-outline-danger" >Delete</button>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-layouts::admin>
