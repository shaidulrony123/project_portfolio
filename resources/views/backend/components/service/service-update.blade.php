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
                                <label class="form-label mt-2">Images</label>
                                <input type="file" class="form-control" id="homeSidebarImageUpdate" multiple>
                                <div id="imagePreviews" style="margin-top: 10px;"></div> <!-- Previews for multiple images -->
                                <input type="hidden" id="existingImagePaths">
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

                // Populate image previews (multiple images)
                let existingImages = service.images || [];
                document.getElementById('existingImagePaths').value = JSON.stringify(existingImages); // Store array of image paths
                let previewDiv = document.getElementById('imagePreviews');
                previewDiv.innerHTML = ''; // Clear previous previews

                existingImages.forEach(imagePath => {
                    let imgTag = document.createElement('img');
                    imgTag.src = imagePath;
                    imgTag.style = "width: 100px; height: 100px; margin-top: 10px; margin-right: 5px;";
                    previewDiv.appendChild(imgTag);
                });
            } else {
                console.error('Failed to fetch service details:', response.data.message);
            }
        } catch (error) {
            console.error('Error fetching service details:', error);
        }
    }

    document.getElementById('homeSidebarImageUpdate').addEventListener('change', function (event) {
        const files = event.target.files;
        const previewDiv = document.getElementById('imagePreviews');
        previewDiv.innerHTML = ''; // Clear any previous previews

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const previewImg = document.createElement('img');
            previewImg.src = URL.createObjectURL(file);
            previewImg.style = "width: 100px; height: 100px; margin-top: 10px; margin-right: 5px;";
            previewDiv.appendChild(previewImg);
        }
    });

   async function serviceUpdate() {
    let formData = new FormData();

    formData.append('id', document.getElementById('updateID').value);
    formData.append('title', document.getElementById('serviceTitleUpdate').value);
    formData.append('description', document.getElementById('serviceDescriptionUpdate').value);

    const newImages = document.getElementById('homeSidebarImageUpdate').files;
    if (newImages.length > 0) {
        // Append each selected image to formData
        for (let i = 0; i < newImages.length; i++) {
            formData.append('images[]', newImages[i]);
        }
    } else {
        // If no new image selected, append the existing images
        formData.append('existing_images', document.getElementById('existingImagePaths').value);
    }

    try {
        let response = await axios.post('/service-update', formData, {
            headers: { 'Content-Type': 'multipart/form-data' },
        });

        if (response.data.status === 'success') {
            // Refresh the service data
            await getServiceData();

            Swal.fire({ icon: 'success', title: response.data.message, timer: 2000 });

            // Close the modal programmatically
            const updateModal = document.getElementById('update-modal');
            const modalInstance = bootstrap.Modal.getInstance(updateModal);
            modalInstance.hide();
        } else {
            Swal.fire({ icon: 'error', title: response.data.message, timer: 2000 });
        }
    } catch (error) {
        console.error('Error updating service:', error);
        Swal.fire({ icon: 'error', title: 'Update failed', timer: 2000 });
    }
}

</script>
