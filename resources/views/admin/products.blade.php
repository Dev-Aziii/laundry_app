<div class="d-flex justify-content-start pt-5">
    <div class="content-area w-100 ms-auto px-4">
        <br>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">All Product</h5>
                <button class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                    <i class="fa-solid fa-square-plus"></i> Add Prodcut
                </button>
            </div>

            <div class="card-body">
                <!-- Controls -->
                <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                    <div class="d-flex align-items-center mb-2">
                        <label class="me-2 mb-0">Show</label>
                        <input type="number" id="showEntries" class="form-control form-control-sm me-2"
                            style="width: 50px;" min="1" value="10">
                        <span>entries</span>
                    </div>

                    <form class="d-flex mb-2" id="searchForm">
                        <input type="text" id="searchInput" class="form-control form-control-sm"
                            placeholder="Search Services" aria-label="Search">
                        <button class="btn btn-primary btn-sm ms-2" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
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
                                <th>Status</th> <!-- Status Column -->
                                <th>Actions</th> <!-- Actions Column -->
                            </tr>
                        </thead>
                        <tbody id="serviceTableBody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
