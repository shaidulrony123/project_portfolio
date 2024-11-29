<div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
                <button type="button" class="btn-close px-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Image</label>
                                <input type="file" class="form-control" id="projectImageUpdate">
                                <img id="imagePreview" src="{{ asset('images/default.png') }}" style="width: 100px; height: 100px; margin-top: 10px;">
                                <input type="hidden" id="existingImagePath">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Name</label>
                                <input type="text" class="form-control" id="projectNameUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Description</label>
                                <textarea class="form-control" id="projectDescriptionUpdate" rows="3"></textarea>
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Url</label>
                                <input type="text" class="form-control" id="projectUrlUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Tags</label>
                                <input type="text" class="form-control" id="projectTagsUpdate">
                            </div>
                            <input class="d-none" id="updateID">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="projectUpdate()" type="button" class="btn btn-success">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function FillUpUpdateForm(id) {
        document.getElementById('updateID').value = id;

        try {
            let response = await axios.post('/project-by-id', { id: id });
            if (response.data.status === 'success') {
                let project = response.data.project;

                document.getElementById('projectNameUpdate').value = project.name;
                document.getElementById('projectDescriptionUpdate').value = project.description;
                document.getElementById('projectUrlUpdate').value = project.url;
                document.getElementById('projectTagsUpdate').value = project.tags;

                // Populate image
                document.getElementById('existingImagePath').value = project.image;
                document.getElementById('imagePreview').src = project.image || '/images/default.png';
            } else {
                console.error('Failed to fetch sidebar details:', response.data.message);
            }
        } catch (error) {
            console.error('Error fetching sidebar details:', error);
        }
    }

    document.getElementById('projectImageUpdate').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const preview = document.getElementById('imagePreview');
        preview.src = file ? URL.createObjectURL(file) : document.getElementById('existingImagePath').value;
    });

    async function projectUpdate() {
    let formData = new FormData();

    formData.append('id', document.getElementById('updateID').value);
    formData.append('name', document.getElementById('projectNameUpdate').value);
    formData.append('description', document.getElementById('projectDescriptionUpdate').value);
    formData.append('url', document.getElementById('projectUrlUpdate').value);
    formData.append('tags', document.getElementById('projectTagsUpdate').value);

    const newImage = document.getElementById('projectImageUpdate').files[0];
    if (newImage) {
        formData.append('image', newImage);
    } else {
        formData.append('existing_image', document.getElementById('existingImagePath').value);
    }

    try {
        let response = await axios.post('/project-update', formData, {
            headers: { 'Content-Type': 'multipart/form-data' },
        });

        if (response.data.status === 'success') {
            // Refresh the sidebar data (or any other UI refresh)
            await getProjectData();

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
