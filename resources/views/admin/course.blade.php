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
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="https://placehold.co/600x400/0d6efd/ffffff?text=Web+Development"
                                    alt="" width="64" class="rounded"></td>
                            <td>Web Development Bootcamp</td>
                            <td>Web Development</td>
                            <td>$49.99</td>
                            <td>12,480</td>
                            <td><a class="btn btn-secondary" href="{{ route('admin-course-teacher',3) }}">Manage</a></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#courseModal" data-title="Web Development Bootcamp"
                                    data-category="Web Development" data-price="49.99" data-enrolled="12480"
                                    data-description="HTML, CSS, JavaScript and responsive design from scratch."
                                    data-img="https://placehold.co/600x400/0d6efd/ffffff?text=Web+Development">Edit</button>
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-title="Web Development Bootcamp">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://placehold.co/600x400/dc3545/ffffff?text=Laravel" alt=""
                                    width="64" class="rounded"></td>
                            <td>Laravel for Beginners</td>
                            <td>Backend</td>
                            <td>$59.99</td>
                            <td>8,250</td>
                            <td><a class="btn btn-secondary" href="{{ route('admin-course-teacher',3) }}">Manage</a></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#courseModal" data-title="Laravel for Beginners"
                                    data-category="Backend" data-price="59.99" data-enrolled="8250"
                                    data-description="Routing, Blade, Eloquent and authentication with Jetstream."
                                    data-img="https://placehold.co/600x400/dc3545/ffffff?text=Laravel">Edit</button>
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-title="Laravel for Beginners">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://placehold.co/600x400/0dcaf0/000000?text=React+%26+Next.js"
                                    alt="" width="64" class="rounded"></td>
                            <td>React &amp; Next.js Essentials</td>
                            <td>Frontend</td>
                            <td>$54.99</td>
                            <td>9,610</td>
                            <td><a class="btn btn-secondary" href="{{ route('admin-course-teacher',3) }}">Manage</a></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#courseModal" data-title="React &amp; Next.js Essentials"
                                    data-category="Frontend" data-price="54.99" data-enrolled="9610"
                                    data-description="Build fast front-ends with components, hooks and SSR."
                                    data-img="https://placehold.co/600x400/0dcaf0/000000?text=React+%26+Next.js">Edit</button>
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-title="React &amp; Next.js Essentials">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://placehold.co/600x400/198754/ffffff?text=Python" alt=""
                                    width="64" class="rounded"></td>
                            <td>Python Programming</td>
                            <td>Programming</td>
                            <td>$39.99</td>
                            <td>21,300</td>
                            <td><a class="btn btn-secondary" href="{{ route('admin-course-teacher',3) }}">Manage</a></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#courseModal" data-title="Python Programming"
                                    data-category="Programming" data-price="39.99" data-enrolled="21300"
                                    data-description="Learn core Python, data structures and automation scripts."
                                    data-img="https://placehold.co/600x400/198754/ffffff?text=Python">Edit</button>
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-title="Python Programming">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://placehold.co/600x400/fd7e14/ffffff?text=MySQL+Databases"
                                    alt="" width="64" class="rounded"></td>
                            <td>Database Design with MySQL</td>
                            <td>Database</td>
                            <td>$44.99</td>
                            <td>5,420</td>
                            <td><a class="btn btn-secondary" href="{{ route('admin-course-teacher',3) }}">Manage</a></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#courseModal" data-title="Database Design with MySQL"
                                    data-category="Database" data-price="44.99" data-enrolled="5420"
                                    data-description="ER diagrams, normalization, joins and query optimization."
                                    data-img="https://placehold.co/600x400/fd7e14/ffffff?text=MySQL+Databases">Edit</button>
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-title="Database Design with MySQL">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://placehold.co/600x400/6f42c1/ffffff?text=DSA" alt=""
                                    width="64" class="rounded"></td>
                            <td>Data Structures &amp; Algorithms</td>
                            <td>Computer Science</td>
                            <td>$64.99</td>
                            <td>7,890</td>
                            <td><a class="btn btn-secondary" href="{{ route('admin-course-teacher',3) }}">Manage</a></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#courseModal" data-title="Data Structures &amp; Algorithms"
                                    data-category="Computer Science" data-price="64.99" data-enrolled="7890"
                                    data-description="Arrays, trees, graphs, sorting and problem solving."
                                    data-img="https://placehold.co/600x400/6f42c1/ffffff?text=DSA">Edit</button>
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-title="Data Structures &amp; Algorithms">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://placehold.co/600x400/d63384/ffffff?text=UI%2FUX+Design"
                                    alt="" width="64" class="rounded"></td>
                            <td>UI/UX Design Fundamentals</td>
                            <td>Design</td>
                            <td>$34.99</td>
                            <td>4,310</td>
                            <td><a class="btn btn-secondary" href="{{ route('admin-course-teacher',3) }}">Manage</a></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#courseModal" data-title="UI/UX Design Fundamentals"
                                    data-category="Design" data-price="34.99" data-enrolled="4310"
                                    data-description="Wireframing, prototyping and usability principles in Figma."
                                    data-img="https://placehold.co/600x400/d63384/ffffff?text=UI%2FUX+Design">Edit</button>
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-title="UI/UX Design Fundamentals">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://placehold.co/600x400/212529/ffffff?text=Git+%26+GitHub"
                                    alt="" width="64" class="rounded"></td>
                            <td>Git &amp; GitHub Workflow</td>
                            <td>Tools</td>
                            <td>Free</td>
                            <td>15,760</td>
                            <td><a class="btn btn-secondary" href="{{ route('admin-course-teacher',3) }}">Manage</a></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#courseModal" data-title="Git &amp; GitHub Workflow"
                                    data-category="Tools" data-price="0" data-enrolled="15760"
                                    data-description="Branching, pull requests and team collaboration."
                                    data-img="https://placehold.co/600x400/212529/ffffff?text=Git+%26+GitHub">Edit</button>
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-title="Git &amp; GitHub Workflow">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://placehold.co/600x400/343a40/ffffff?text=Cybersecurity"
                                    alt="" width="64" class="rounded"></td>
                            <td>Cybersecurity Basics</td>
                            <td>Security</td>
                            <td>$49.99</td>
                            <td>3,680</td>
                            <td><a class="btn btn-secondary" href="{{ route('admin-course-teacher',3) }}">Manage</a></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#courseModal" data-title="Cybersecurity Basics"
                                    data-category="Security" data-price="49.99" data-enrolled="3680"
                                    data-description="Common web vulnerabilities and how to defend against them."
                                    data-img="https://placehold.co/600x400/343a40/ffffff?text=Cybersecurity">Edit</button>
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-title="Cybersecurity Basics">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://placehold.co/600x400/20c997/000000?text=Machine+Learning"
                                    alt="" width="64" class="rounded"></td>
                            <td>Machine Learning Intro</td>
                            <td>AI &amp; Data</td>
                            <td>$69.99</td>
                            <td>11,040</td>
                            <td><a class="btn btn-secondary" href="{{ route('admin-course-teacher',3) }}">Manage</a></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#courseModal" data-title="Machine Learning Intro"
                                    data-category="AI &amp; Data" data-price="69.99" data-enrolled="11040"
                                    data-description="Regression, classification and your first trained model."
                                    data-img="https://placehold.co/600x400/20c997/000000?text=Machine+Learning">Edit</button>
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-title="Machine Learning Intro">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-layouts::admin>