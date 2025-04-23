<div class="d-flex justify-content-end pt-5">
    <div class="card shadow-lg p-4 rounded-4 border-0 mt-5" style="width: 82%;">
            <div class="text-end">
                <button class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#addProductModal">
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
                    <tbody id="productTableBody">
                        <!-- Dynamic Rows Here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addProductForm">
                        <div class="mb-2">
                            <label class="form-label">Name</label>
                            <input type="text" id="newProductName" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Variant</label>
                            <input type="text" id="newProductVariant" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Discount Price</label>
                            <input type="text" id="newProductDiscountPrice" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Price</label>
                            <input type="text" id="newProductPrice" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Description</label>
                            <input type="text" id="newProductDescription" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Thumbnail</label>
                            <input type="file" id="newProductThumbnail" class="form-control" accept="image/*">
                            <img id="thumbnailPreview" class="img-thumbnail mt-2 d-none" style="max-width: 100px;">
                        </div>
                        <button type="button" class="btn btn-primary w-100" id="addProductBtn">
                            <i class="bi bi-plus-circle"></i> Add Product
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function () {
            // Preview uploaded image
            $("#newProductThumbnail").change(function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $("#thumbnailPreview").attr("src", e.target.result).removeClass("d-none");
                    };
                    reader.readAsDataURL(file);
                }
            });

            $("#addProductBtn").click(function () {
                const name = $("#newProductName").val().trim(); 
                const variant = $("#newProductVariant").val().trim();
                const discount = $("#newProductDiscountPrice").val().trim();
                const price = $("#newProductPrice").val().trim();
                const desc = $("#newProductDescription").val().trim();
                const thumbnailSrc = $("#thumbnailPreview").attr("src");

                if (name && price) {
                    $("#productTableBody").append(
                        `<tr>
                            <td>${name}</td>
                            <td>${thumbnailSrc ? `<img src="${thumbnailSrc}" class="img-thumbnail" style="max-width: 80px;">` : 'No Image'}</td>
                            <td>${variant}</td>
                            <td><del>P${discount}</del></td>
                            <td>P${price}</td>
                            <td>${desc}</td>
                            <td>
                                <button class="btn btn-sm btn-primary">Sub Products</button>
                                <button class="btn btn-sm btn-danger delete-product"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>`
                    );

                    // Reset form
                    $("#addProductForm")[0].reset();
                    $("#thumbnailPreview").attr("src", "").addClass("d-none");
                    $('#addProductModal').modal('hide');
                } else {
                    alert("Please fill in name and price.");
                }
            });

            // Delete product
            $(document).on("click", ".delete-product", function () {
                $(this).closest("tr").remove();
            });
        });
    </script>

