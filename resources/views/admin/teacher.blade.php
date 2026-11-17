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
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                        style="width:40px;height:40px;">AR</div>
                                    <span>Ayesha Rahman</span>
                                </div>
                            </td>
                            <td>ayesha@example.com</td>
                            <td>12 Sep 2026</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-name="Ayesha Rahman">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                        style="width:40px;height:40px;">TH</div>
                                    <span>Tanvir Hossain</span>
                                </div>
                            </td>
                            <td>tanvir@example.com</td>
                            <td>28 Sep 2026</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-name="Tanvir Hossain">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                        style="width:40px;height:40px;">NJ</div>
                                    <span>Nusrat Jahan</span>
                                </div>
                            </td>
                            <td>nusrat@example.com</td>
                            <td>03 Oct 2026</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-name="Nusrat Jahan">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                        style="width:40px;height:40px;">IK</div>
                                    <span>Imran Khan</span>
                                </div>
                            </td>
                            <td>imran@example.com</td>
                            <td>19 Oct 2026</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-name="Imran Khan">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                        style="width:40px;height:40px;">FA</div>
                                    <span>Farhana Akter</span>
                                </div>
                            </td>
                            <td>farhana@example.com</td>
                            <td>05 Nov 2026</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-name="Farhana Akter">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-layouts::admin>
