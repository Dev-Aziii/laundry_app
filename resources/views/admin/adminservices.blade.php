<div class="d-flex justify-content-start pt-5">
    <div class="content-area w-100 ms-auto px-4">
        <br>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">All Services</h5>
                <button class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                    <i class="fa-solid fa-square-plus"></i> Add Service
                </button>
            </div>

            <div class="card-body">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <label for="statusFilter" class="form-label mb-0">Filter by Status:</label>
                    <select id="statusFilter" class="form-select form-select-sm w-auto">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="archived">Archived</option>
                    </select>

                </div>
                <!-- Service Table -->
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="table-light">
                            <tr>
                                <th>Service Name</th>
                                <th>Thumbnail</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Duration</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="serviceTableBody">
                            @include('admin.partials.service-table', ['services' => $services])
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Service Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addServiceModalLabel">Add New Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addServiceForm" action="{{ route('services.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="newService" class="form-label">Service Name</label>
                        <input type="text" id="newService" name="service_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="newDescription" class="form-label">Description</label>
                        <input type="text" id="newDescription" name="description" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="newPrice" class="form-label">Price per KG</label>
                        <input type="number" id="newPrice" name="price_per_kg" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="newDuration" class="form-label">Duration</label>
                        <input type="text" id="newDuration" name="duration" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="newThumbnail" class="form-label">Service Thumbnail</label>
                        <input type="file" id="newThumbnail" name="image1" class="form-control" accept="image/*">
                        <div class="mt-2">
                            <img id="thumbnailPreview" src="" alt="Thumbnail Preview"
                                class="img-thumbnail d-none" style="max-width: 150px;">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-plus-circle"></i> Add Service
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
