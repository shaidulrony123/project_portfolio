<div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
                <button type="button" class="btn-close px-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Image</label>
                                <input type="file" class="form-control" id="homeSidebarImageUpdate">
                                <img id="imagePreview" src="{{ asset('images/default.png') }}" style="width: 100px; height: 100px; margin-top: 10px;">
                                <input type="hidden" id="existingImagePath">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Title</label>
                                <input type="text" class="form-control" id="serviceTitleUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Description</label>
                                <textarea class="form-control" id="serviceDescriptionUpdate" rows="3"></textarea>
                            </div>
                        
                            <input class="d-none" id="updateID">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="serviceUpdate()" type="button" class="btn btn-success">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function FillUpUpdateForm(id) {
        document.getElementById('updateID').value = id;

        try {
            let response = await axios.post('/service-by-id', { id: id });
            if (response.data.status === 'success') {
                let service = response.data.service;

                document.getElementById('serviceTitleUpdate').value = service.title;
                document.getElementById('serviceDescriptionUpdate').value = service.description;
                

                // Populate image
                document.getElementById('existingImagePath').value = service.image;
                document.getElementById('imagePreview').src = service.image || '/images/default.png';
            } else {
                console.error('Failed to fetch sidebar details:', response.data.message);
            }
        } catch (error) {
            console.error('Error fetching sidebar details:', error);
        }
    }

    document.getElementById('homeSidebarImageUpdate').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const preview = document.getElementById('imagePreview');
        preview.src = file ? URL.createObjectURL(file) : document.getElementById('existingImagePath').value;
    });

    async function serviceUpdate() {
    let formData = new FormData();

    formData.append('id', document.getElementById('updateID').value);
    formData.append('title', document.getElementById('serviceTitleUpdate').value);
    formData.append('description', document.getElementById('serviceDescriptionUpdate').value);
    

    const newImage = document.getElementById('homeSidebarImageUpdate').files[0];
    if (newImage) {
        formData.append('image', newImage);
    } else {
        formData.append('existing_image', document.getElementById('existingImagePath').value);
    }

    try {
        let response = await axios.post('/service-update', formData, {
            headers: { 'Content-Type': 'multipart/form-data' },
        });

        if (response.data.status === 'success') {
            // Refresh the sidebar data (or any other UI refresh)
            await getServiceData();

            // Show success notification
            Swal.fire({ icon: 'success', title: response.data.message, timer: 2000 });

            // Close the modal programmatically
            const updateModal = document.getElementById('update-modal');
            const modalInstance = bootstrap.Modal.getInstance(updateModal);
            modalInstance.hide();
        } else {
            Swal.fire({ icon: 'error', title: response.data.message, timer: 2000 });
        }
    } catch (error) {
        console.error('Error updating sidebar:', error);
        Swal.fire({ icon: 'error', title: 'Update failed', timer: 2000 });
    }
}

</script>
