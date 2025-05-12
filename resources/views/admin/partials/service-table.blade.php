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
                <input class="form-check-input toggle-status" type="checkbox" data-id="{{ $service->id }}"
                    {{ $service->status === 'active' ? 'checked' : '' }}>

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

<!-- Status Change Confirmation Modal -->
<div class="modal fade" id="statusChangeModal" tabindex="-1" aria-labelledby="statusChangeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Status Change</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to <span id="statusChangeAction"></span> this service?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="confirmStatusChange" class="btn btn-danger">Yes, Confirm</button>
            </div>
        </div>
    </div>
</div>


<!-- Toast Notification -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1055">
    <div id="statusToast" class="toast align-items-center text-white bg-success border-0" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="toastMessage">
                Status updated successfully!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Handle button clicks for Restore and Archive
        $(document).ready(function() {
            // Handles clicking on the restore or archive buttons
            // Displays a confirmation modal for the selected action (restore/archive)
            $('[data-action="restore"], [data-action="archive"]').on('click', function() {
                var action = $(this).data('action');
                var serviceId = $(this).data('id');
                var formId = action + 'Form-' + serviceId;
                var actionUrl = $('#' + formId).attr('action');

                var message = action === 'restore' ?
                    'Are you sure you want to restore this service?' :
                    'Are you sure you want to archive this service?';
                $('#confirmationMessage').text(message);

                $('#confirmationModal').modal('show');

                // submit form
                $('#confirmAction').off('click').on('click', function() {
                    $('#' + formId).submit();
                });
            });

            // Handles clicking on the archive button
            // Displays the confirmation modal for archiving a service
            $('.btn-warning[data-action="archive"]').on('click', function() {
                var serviceId = $(this).data('id');
                var formId = 'archiveForm-' + serviceId;
                var actionUrl = $('#' + formId).attr('action');

                // Set up the confirmation modal for archive
                $('#confirmationMessage').text(
                    'Are you sure you want to archive this service?');
                $('#confirmationModal').modal('show');

                // On confirm, submit the form
                $('#confirmAction').off('click').on('click', function() {
                    $('#' + formId).submit();
                });
            });

            // Archive form submission handler with toast but does not refresh
            /*
            $('form[id^="archiveForm-"]').on('submit', function(e) {
                e.preventDefault();

                var form = $(this);
                var actionUrl = form.attr('action');
                var serviceId = form.attr('id').split('-')[1];

                $.ajax({
                    url: actionUrl,
                    type: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        // Show toast
                        $('#toastMessage').text('Service archived successfully!');
                        const toast = new bootstrap.Toast(document.getElementById(
                            'statusToast'));
                        toast.show();

                        // Optionally, remove or hide the row or update the UI to reflect the change
                        $(`#service-row-${serviceId}`).fadeOut();

                        // Close the confirmation modal
                        $('#confirmationModal').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        // Handle error if needed
                        console.log('Error archiving service:', error);
                    }
                });
            });
            */

            // Handles clicking on the edit button for a service
            // Populates the modal with the service data and displays it for editing
            $('.btn-edit').on('click', function() {
                var serviceId = $(this).data('id');

                // Get the service data from the button's data attributes
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
                    $('#editThumbnailPreview').attr('src', '/storage/' + serviceData.image)
                        .removeClass('d-none');
                } else {
                    $('#editThumbnailPreview').addClass('d-none');
                }

                // Open the modal for editing the service
                $('#editServiceModal').modal('show');
            });

            // Handles the status change toggle for services
            // Stores the details of the pending status change and shows a confirmation modal
            let pendingStatusChange = {
                id: null,
                status: null
            };

            $('.toggle-status').on('change', function() {
                const isChecked = $(this).is(':checked');
                const serviceId = $(this).data('id');
                const status = isChecked ? 'active' : 'inactive';

                // Store the status change details for confirmation
                pendingStatusChange = {
                    id: serviceId,
                    status: status
                };

                // Show the status change confirmation modal
                $('#statusChangeAction').text(status === 'active' ? 'activate' : 'deactivate');
                $('#statusChangeModal').modal('show');

                // Revert the toggle until the status change is confirmed
                $(this).prop('checked', !isChecked);
            });

            // Handles the confirmation of status change
            // Sends an AJAX request to update the service status
            $('#confirmStatusChange').on('click', function() {
                const {
                    id,
                    status
                } = pendingStatusChange;

                $.ajax({
                    url: `/services/${id}/status`,
                    type: 'PATCH',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: status
                    },
                    success: function(response) {
                        // Close the modal
                        $('#statusChangeModal').modal('hide');

                        // Show toast with success message
                        $('#toastMessage').text(response.message ||
                            'Status updated successfully!');
                        const toast = new bootstrap.Toast(document.getElementById(
                            'statusToast'));
                        toast.show();

                        // Update the toggle switch to reflect the new status
                        $(`.toggle-status[data-id="${id}"]`).prop('checked',
                            status === 'active');
                    },
                });
            });
        });
    });
</script>
