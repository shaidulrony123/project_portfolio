<div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Sidebar Information</h5>
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
                                <label class="form-label mt-2">Name</label>
                                <input type="text" class="form-control" id="homeSidebarNameUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Slug</label>
                                <input type="text" class="form-control" id="homeSidebarSlugUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Description</label>
                                <input type="text" class="form-control" id="homeSidebarDescriptionUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Github Update</label>
                                <input type="text" class="form-control" id="githubLinkUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Twitter Update</label>
                                <input type="text" class="form-control" id="twitterLinkUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Linkedin Update</label>
                                <input type="text" class="form-control" id="linkedinLinkUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Facebook Update</label>
                                <input type="text" class="form-control" id="facebookLinkUpdate">
                            </div>
                            <input class="d-none" id="updateID">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="homeSidebarUpdate()" type="button" class="btn btn-success">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function FillUpUpdateForm(id) {
        document.getElementById('updateID').value = id;

        try {
            let response = await axios.post('/home-sidebar-by-id', { id: id });
            if (response.data.status === 'success') {
                let sidebar = response.data.homeSidebar;

                document.getElementById('homeSidebarNameUpdate').value = sidebar.name;
                document.getElementById('homeSidebarSlugUpdate').value = sidebar.slug;
                document.getElementById('homeSidebarDescriptionUpdate').value = sidebar.description;
                document.getElementById('githubLinkUpdate').value = sidebar.github_link;
                document.getElementById('twitterLinkUpdate').value = sidebar.twitter_link;
                document.getElementById('linkedinLinkUpdate').value = sidebar.linkedin_link;
                document.getElementById('facebookLinkUpdate').value = sidebar.facebook_link;

                // Populate image
                document.getElementById('existingImagePath').value = sidebar.image;
                document.getElementById('imagePreview').src = sidebar.image || '/images/default.png';
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

    async function homeSidebarUpdate() {
    let formData = new FormData();

    formData.append('id', document.getElementById('updateID').value);
    formData.append('name', document.getElementById('homeSidebarNameUpdate').value);
    formData.append('slug', document.getElementById('homeSidebarSlugUpdate').value);
    formData.append('description', document.getElementById('homeSidebarDescriptionUpdate').value);
    formData.append('github_link', document.getElementById('githubLinkUpdate').value);
    formData.append('twitter_link', document.getElementById('twitterLinkUpdate').value);
    formData.append('linkedin_link', document.getElementById('linkedinLinkUpdate').value);
    formData.append('facebook_link', document.getElementById('facebookLinkUpdate').value);

    const newImage = document.getElementById('homeSidebarImageUpdate').files[0];
    if (newImage) {
        formData.append('image', newImage);
    } else {
        formData.append('existing_image', document.getElementById('existingImagePath').value);
    }

    try {
        let response = await axios.post('/home-sidebar-update', formData, {
            headers: { 'Content-Type': 'multipart/form-data' },
        });

        if (response.data.status === 'success') {
            // Refresh the sidebar data (or any other UI refresh)
            await getSidebarData();

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
