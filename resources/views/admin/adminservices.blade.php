<div class="d-flex justify-content-end pt-5">
    <div class="card shadow-lg p-4 rounded-4 border-0 mt-5" style="width: 82%;">
        <!-- Add Service Button -->
        <div class="text-end">
            <button class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                <i class="bi bi-plus-circle"></i> Add Service
            </button>
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
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="serviceTableBody">
                    <!-- Dynamic Rows Here -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Service Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addServiceModalLabel">Add New Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addServiceForm">
                    <div class="mb-3">
                        <label for="newService" class="form-label">Service Name</label>
                        <input type="text" id="newService" class="form-control" placeholder="Enter service name">
                    </div>
                    <div class="mb-3">
                        <label for="newDescription" class="form-label">Description</label>
                        <input type="text" id="newDescription" class="form-control" placeholder="Enter description">
                    </div>
                    <div class="mb-3">
                        <label for="newPrice" class="form-label">Price</label>
                        <input type="number" id="newPrice" class="form-control" placeholder="Enter price">
                    </div>
                    <div class="mb-3">
                        <label for="newStatus" class="form-label">Status</label>
                        <select id="newStatus" class="form-select">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="newThumbnail" class="form-label">Service Thumbnail</label>
                        <input type="file" id="newThumbnail" class="form-control" accept="image/*">
                        <div class="mt-2">
                            <img id="thumbnailPreview" src="" alt="Thumbnail Preview" class="img-thumbnail d-none" style="max-width: 150px;">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary w-100" id="addService">
                        <i class="bi bi-plus-circle"></i> Add Service
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Handle file input change event to show thumbnail preview
        $("#newThumbnail").change(function (event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#thumbnailPreview").attr("src", e.target.result).removeClass("d-none");
                };
                reader.readAsDataURL(file);
            }
        });

        $("#addService").click(function () {
            var newService = $("#newService").val().trim();
            var newDescription = $("#newDescription").val().trim();
            var newPrice = $("#newPrice").val().trim();
            var newStatus = $("#newStatus").val();
            var thumbnailSrc = $("#thumbnailPreview").attr("src");

            if (newService !== "" && newPrice !== "" && !isNaN(newPrice)) {
                $("#serviceTableBody").append(`
                    <tr>
                        <td><strong>${newService}</strong></td>
                        <td><img src="${thumbnailSrc}" class="img-fluid" style="max-width: 80px;" /></td>
                        <td>${newDescription}</td>
                        <td>P${newPrice}</td>
                        <td><span class="badge bg-${newStatus === 'Active' ? 'success' : 'danger'}">${newStatus}</span></td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editServiceModal">
                                <i class="bi bi-pencil"></i> Edit
                            </button>
                        </td>
                    </tr>
                `);

                $("#addServiceModal").modal('hide');
                $("#addServiceForm")[0].reset();
                $("#thumbnailPreview").addClass("d-none");
                $('#addProductModal').modal('hide');
            }
        });
    });
</script>
