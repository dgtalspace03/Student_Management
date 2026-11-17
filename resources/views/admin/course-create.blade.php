<x-layouts::admin>
    
<div class=" py-1" style="max-width: 820px;">

  <a href="{{ route('admin-course') }}" class="text-decoration-none">&larr; Back to courses</a>
  <h2 class="h2 mt-2 mb-4">Add course</h2>

  <!-- Dummy: Save just goes back to the list page -->
  <form action="admin-courses-ui.html" class="card shadow-sm">
    <div class="card-body row g-3">

      <div class="col-md-6">
        <label class="form-label" for="title">Title</label>
        <input type="text" id="title" class="form-control" required>
      </div>

      <div class="col-md-6">
        <label class="form-label" for="category">Category</label>
        <input type="text" id="category" class="form-control" required>
      </div>

      <div class="col-md-4">
        <label class="form-label" for="price">Price</label>
        <input type="number" step="0.01" min="0" id="price" class="form-control" value="0" required>
      </div>

      <div class="col-md-4">
        <label class="form-label" for="enrolled">Students enrolled</label>
        <input type="number" min="0" id="enrolled" class="form-control" value="0" required>
      </div>

      <div class="col-md-4">
        <label class="form-label" for="img">Image URL</label>
        <input type="text" id="img" class="form-control" placeholder="https://...">
      </div>

      <div class="col-12">
        <label class="form-label" for="description">Description</label>
        <textarea id="description" rows="4" class="form-control" required></textarea>
      </div>

    </div>
    <div class="card-footer bg-white d-flex gap-2">
      <button type="submit" class="btn btn-success">Save course</button>
      <a href="admin-courses-ui.html" class="btn btn-outline-secondary">Cancel</a>
    </div>
  </form>

</div>
</x-layouts::admin>