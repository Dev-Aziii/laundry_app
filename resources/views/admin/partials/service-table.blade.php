@foreach ($services as $service)
    <tr style="height: 80px;">
        <td class="align-middle">{{ $service->service_name }}</td>
        <td class="align-middle">
            <img src="{{ asset('storage/' . $service->image1) }}" alt="Thumbnail" style="width: 100px; height: 100px;">
        </td>
        <td class="align-middle">{{ $service->description }}</td>
        <td class="align-middle">{{ number_format($service->price_per_kg, 2) }}</td>
        <td class="align-middle">{{ $service->duration }}</td>
        <td class="align-middle">
            <div class="form-check form-switch d-flex justify-content-center">
                <input class="form-check-input" type="checkbox" {{ $service->status === 'active' ? 'checked' : '' }}
                    disabled>
            </div>
        </td>
        <td class="align-middle">
            @if (request('status') === 'archived')
                <div class="d-flex justify-content-center">
                    <form id="restoreForm-{{ $service->id }}" action="{{ route('services.restore', $service->id) }}"
                        method="POST" class="d-none">
                        @csrf
                        @method('PATCH')
                    </form>
                    <button type="button" class="btn btn-success btn-sm" title="Restore" data-action="restore"
                        data-id="{{ $service->id }}">
                        <i class="fas fa-undo-alt"></i>
                    </button>
                </div>
            @else
                <div class="d-flex justify-content-between">
                    <a href="#" class="btn btn-primary btn-sm btn-edit order-btn" title="Edit"
                        data-id="{{ $service->id }}" data-name="{{ $service->service_name }}"
                        data-description="{{ $service->description }}" data-price="{{ $service->price_per_kg }}"
                        data-duration="{{ $service->duration }}" data-image="{{ $service->image1 }}">
                        <i class="fas fa-pencil"></i>
                    </a>

                    </a>
                    <form id="archiveForm-{{ $service->id }}" action="{{ route('services.archive', $service->id) }}"
                        method="POST" class="d-none">
                        @csrf
                        @method('GET')
                    </form>
                    <button type="button" class="btn btn-warning btn-sm order-btn" title="Archive"
                        data-action="archive" data-id="{{ $service->id }}">
                        <i class="fas fa-archive"></i>
                    </button>
                </div>
            @endif
        </td>
    </tr>
@endforeach

<!-- Edit Service Modal -->
<div class="modal fade" id="editServiceModal" tabindex="-1" aria-labelledby="editServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editServiceForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" id="editServiceId" name="id">

                    <div class="mb-3">
                        <label for="editServiceName" class="form-label">Service Name</label>
                        <input type="text" id="editServiceName" name="service_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="editDescription" class="form-label">Description</label>
                        <input type="text" id="editDescription" name="description" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="editPrice" class="form-label">Price per KG</label>
                        <input type="number" id="editPrice" name="price_per_kg" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="editDuration" class="form-label">Duration</label>
                        <input type="text" id="editDuration" name="duration" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="editThumbnail" class="form-label">Service Thumbnail</label>
                        <input type="file" id="editThumbnail" name="image1" class="form-control"
                            accept="image/*">
                        <div class="mt-2">
                            <img id="editThumbnailPreview" src="" alt="Thumbnail Preview"
                                class="img-thumbnail d-none" style="max-width: 150px;">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-pencil"></i> Update Service
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Confirmation Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirm Action</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="confirmationMessage">Are you sure you want to perform this action?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="confirmAction" class="btn btn-danger">Confirm</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Handle button clicks for Restore and Archive
        $('[data-action="restore"], [data-action="archive"]').on('click', function() {
            var action = $(this).data('action');
            var serviceId = $(this).data('id');
            var formId = action + 'Form-' + serviceId;
            var actionUrl = $('#' + formId).attr('action');

            // Set the message based on action type
            var message = action === 'restore' ? 'Are you sure you want to restore this service?' :
                'Are you sure you want to archive this service?';
            $('#confirmationMessage').text(message);

            // Show the confirmation modal
            $('#confirmationModal').modal('show');

            // On confirm, submit the form
            $('#confirmAction').off('click').on('click', function() {
                $('#' + formId).submit();
            });
        });

        $('.btn-edit').on('click', function() {
            var serviceId = $(this).data('id');

            // Get the service data (you can make an AJAX request or pass the data directly)
            var serviceData = {
                id: serviceId,
                service_name: $(this).data('name'),
                description: $(this).data('description'),
                price_per_kg: $(this).data('price'),
                duration: $(this).data('duration'),
                image: $(this).data('image')
            };

            // Set the values in the modal form
            $('#editServiceId').val(serviceData.id);
            $('#editServiceName').val(serviceData.service_name);
            $('#editDescription').val(serviceData.description);
            $('#editPrice').val(serviceData.price_per_kg);
            $('#editDuration').val(serviceData.duration);

            // Display the current image in the modal
            if (serviceData.image) {
                $('#editThumbnailPreview').attr('src', '/storage/' + serviceData.image).removeClass(
                    'd-none');
            } else {
                $('#editThumbnailPreview').addClass('d-none');
            }

            // Open the modal
            $('#editServiceModal').modal('show');
        });
    });
</script>
