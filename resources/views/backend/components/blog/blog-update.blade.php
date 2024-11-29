<div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Blog</h5>
                <button type="button" class="btn-close px-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 p-1">
                                <label class="form-label mt-2">Image</label>
                                <input type="file" class="form-control" id="blogImageUpdate">
                                <img id="imagePreview" src="{{ asset('images/default.png') }}"
                                    style="width: 100px; height: 100px; margin-top: 10px;">
                                <input type="hidden" id="existingImagePath">
                            </div>
                            <div class="col-6 p-1">
                                <label class="form-label mt-2">Category</label>
                                <select class="form-select" id="blogCategoryUpdate">
                                    <!-- Categories will be dynamically populated -->
                                </select>
                            </div>

                            <div class="col-6 p-1">
                                <label class="form-label mt-2">Title</label>
                                <input type="text" class="form-control" id="blogTitleUpdate">
                            </div>

                            <div class="col-6 p-1">
                                <label class="form-label mt-2">Date</label>
                                <input type="text" class="form-control" id="blogDateUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Description</label>
                                <textarea class="form-control" id="blogDescriptionUpdate"></textarea>
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Status</label>
                                <select class="form-select" id="blogStatusUpdate">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <input class="d-none" id="updateID">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button onclick="blogUpdate()" type="button" class="btn btn-success">Update</button>
            </div>
        </div>
    </div>
</div>


<script>
    // Initialize Summernote when the modal is opened
    document.getElementById('update-modal').addEventListener('shown.bs.modal', function () {
        $('#blogDescriptionUpdate').summernote({
            height: 150, // Set height
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
        });
    });

    // Destroy Summernote instance when the modal is closed
    document.getElementById('update-modal').addEventListener('hidden.bs.modal', function () {
        $('#blogDescriptionUpdate').summernote('destroy');
    });
    async function FillUpUpdateForm(id) {
        document.getElementById('updateID').value = id;

        try {
            // Fetch blog data by ID
            let response = await axios.post('/blog-by-id', {
                id: id
            });

            if (response.data.status === 'success') {
                const blog = response.data.blog;

                // Populate blog details
                document.getElementById('blogTitleUpdate').value = blog.title;
                $('#blogDescriptionUpdate').summernote('code', blog.description); // Set Summernote content
                document.getElementById('blogDateUpdate').value = blog.date;
                document.getElementById('blogStatusUpdate').value = blog.status;
                document.getElementById('existingImagePath').value = blog.image;
                document.getElementById('imagePreview').src = blog.image || '/images/default.png';

                // Fetch and populate category dropdown
                const categoryResponse = await axios.get('/categories'); // Replace with your category endpoint
                const categories = categoryResponse.data.categories;

                const categoryDropdown = document.getElementById('blogCategoryUpdate');
                categoryDropdown.innerHTML = ''; // Clear existing options

                // Add a default "Select" option
                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.textContent = 'Select a category';
                categoryDropdown.appendChild(defaultOption);

                // Populate categories
                categories.forEach(category => {
                    const option = document.createElement('option');
                    option.value = category.id;
                    option.textContent = category.name;
                    if (category.id === blog.category_id) {
                        option.selected = true; // Pre-select the correct category
                    }
                    categoryDropdown.appendChild(option);
                });
            } else {
                console.error('Failed to fetch blog details:', response.data.message);
            }
        } catch (error) {
            console.error('Error fetching blog details:', error);
        }
    }


    document.getElementById('blogImageUpdate').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const preview = document.getElementById('imagePreview');
        preview.src = file ? URL.createObjectURL(file) : document.getElementById('existingImagePath').value;
    });

    async function blogUpdate() {
    let formData = new FormData();

    formData.append('id', document.getElementById('updateID').value);
    formData.append('title', document.getElementById('blogTitleUpdate').value);
    formData.append('description', $('#blogDescriptionUpdate').summernote('code')); // Get Summernote content
    formData.append('date', document.getElementById('blogDateUpdate').value);
    formData.append('status', document.getElementById('blogStatusUpdate').value);
    formData.append('category_id', document.getElementById('blogCategoryUpdate').value); // Add category ID

    const newImage = document.getElementById('blogImageUpdate').files[0];
    if (newImage) {
        formData.append('image', newImage);
    } else {
        formData.append('existing_image', document.getElementById('existingImagePath').value);
    }

    try {
        let response = await axios.post('/blog-update', formData, {
            headers: { 'Content-Type': 'multipart/form-data' },
        });

        if (response.data.status === 'success') {
            // Refresh blog data
            await getBlogData();

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
        console.error('Error updating blog:', error);
        Swal.fire({ icon: 'error', title: 'Update failed', timer: 2000 });
    }
}


</script>
