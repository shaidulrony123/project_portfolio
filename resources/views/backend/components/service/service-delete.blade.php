<!-- Modal for Deleting a Service -->
<div class="modal fade" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class="mt-3 text-warning">Delete !</h3>
                <p class="mb-3">Once deleted, you can't get it back.</p>
                <input class="d-none" id="deleteID"/>
                <input class="d-none" id="deleteFilePath"/>
            </div>
            <div class="modal-footer d-flex justify-content-end">
                <div>
                    <button type="button" id="delete-modal-close" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button onclick="ServiceDelete()" type="button" id="confirmDelete" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to trigger deletion of service
    async function ServiceDelete() {
    try {
        // Get the service ID
        let id = document.getElementById('deleteID').value;
        
        // Get the image paths (if any)
        let deleteFilePath = document.getElementById('deleteFilePath').value;
        
        // If deleteFilePath is empty, set it as an empty array
        let imagePaths = [];
        if (deleteFilePath) {
            try {
                imagePaths = JSON.parse(deleteFilePath); // Try parsing JSON
            } catch (e) {
                console.error("Error parsing image paths:", e);
                imagePaths = []; // If parsing fails, set as empty array
            }
        }

        // Close the modal
        document.getElementById('delete-modal-close').click();

        // Show the loader
        showLoader();
        
        // Make the delete request to the backend with the service ID and images
        let response = await axios.post("/service-delete", { id: id, images: imagePaths });
        
        // Hide the loader
        hideLoader();

        // Handle the response
        if (response.data.status === 'success') {
            // Refresh the service list
            await getServiceData();
            Swal.fire({
                icon: 'success',
                title: response.data['message'],
                showConfirmButton: false,
                timer: 2000
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: response.data['message'],
                showConfirmButton: false,
                timer: 2000
            });
        }
    } catch (e) {
        console.error(e);
        Swal.fire({ icon: 'error', title: 'Failed to delete service', timer: 2000 });
    }
}

</script>
