<div class="d-flex justify-content-end  min-vh-100 pt-2 pe-5">
    <div class="card shadow-lg p-4 rounded-4 border-0 mt-5" style="width: 80%;">
        <div class="text-end">
            <button class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                <i class="bi bi-plus-circle"></i> Add New Product
            </button>
        </div>

        <div class="table-responsive mt-3">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-light">
                    <tr>
                        <th>Product Name</th>
                        <th>Thumbnail</th>
                        <th>Variant</th>
                        <th>Discount Price</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Action</th>
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
                <h5 class="modal-title">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addServiceForm">
                    <div class="mb-2">
                        <label class="form-label">Name</label>
                        <input type="text" id="newEnglishName" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Variant</label>
                        <input type="text" id="newVariant" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Discount Price</label>
                        <input type="text" id="newDiscountPrice" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Price</label>
                        <input type="text" id="newPrice" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Description</label>
                        <input type="text" id="newDescription" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Thumbnail</label>
                        <input type="file" id="newThumbnail" class="form-control" accept="image/*">
                        <img id="thumbnailPreview" class="img-thumbnail mt-2 d-none" style="max-width: 100px;">
                    </div>
                    <button type="button" class="btn btn-primary w-100" id="addService">
                        <i class="bi bi-plus-circle"></i> Add Product
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function () {
        // Preview uploaded image
        $("#newThumbnail").change(function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $("#thumbnailPreview").attr("src", e.target.result).removeClass("d-none");
                };
                reader.readAsDataURL(file);
            }
        });

        $("#addService").click(function () {
            const name = $("#newEnglishName").val().trim(); // 🔧 Fix the ID here
            const variant = $("#newVariant").val().trim();
            const discount = $("#newDiscountPrice").val().trim();
            const price = $("#newPrice").val().trim();
            const desc = $("#newDescription").val().trim();
            const thumbnailSrc = $("#thumbnailPreview").attr("src");

            if (name && price) {
                $("#serviceTableBody").append(`
                    <tr>
                        <td>${name}</td>
                        <td>${thumbnailSrc ? `<img src="${thumbnailSrc}" class="img-thumbnail" style="max-width: 80px;">` : 'No Image'}</td>
                        <td>${variant}</td>
                        <td><del>P${discount}</del></td>
                        <td>P${price}</td>
                        <td>${desc}</td>
                        <td>
                            <button class="btn btn-sm btn-primary">Sub Products</button>
                            <button class="btn btn-sm btn-danger delete-service"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                `);

                // Reset form
                $("#addServiceForm")[0].reset();
                $("#thumbnailPreview").attr("src", "").addClass("d-none");
                $('#addServiceModal').modal('hide');
            } else {
                alert("Please fill in name and price.");
            }
        });

        // Delete row
        $(document).on("click", ".delete-service", function () {
            $(this).closest("tr").remove();
        });
    });
</script>

