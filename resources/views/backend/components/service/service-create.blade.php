<div class="modal fade" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Service</h5>
                <button type="button" class="btn-close px-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create-service-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <div id="imagePreviewContainer" class="d-flex flex-wrap gap-2">
                                    <img width="100px" height="100px" src="{{ asset('assets/images/default.jpg') }}" />
                                </div>
                                <br />
                                <label class="form-label mt-2">Images</label>
                                <input oninput="previewServiceImages(event)" type="file" multiple class="form-control" id="serviceImages" accept="image/*">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Title</label>
                                <input type="text" class="form-control" id="serviceTitle" placeholder="Enter service name">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Description</label>
                                <textarea class="form-control" id="serviceDescription" rows="3" placeholder="Enter service description"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="serviceCreate()" type="button" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>


<script>
// Image preview function when selecting multiple files
function previewServiceImages(event) {
    const files = event.target.files;
    const previewContainer = document.getElementById('imagePreviewContainer');
    previewContainer.innerHTML = ""; // Clear existing previews

    for (const file of files) {
        const imgElement = document.createElement('img');
        imgElement.src = URL.createObjectURL(file);
        imgElement.width = 100;
        imgElement.height = 100;
        imgElement.classList.add('me-2', 'mb-2');
        previewContainer.appendChild(imgElement);
    }
}

// Function to create service and upload images
async function serviceCreate() {
    try {
        const serviceImages = document.getElementById('serviceImages').files;
        const serviceTitle = document.getElementById('serviceTitle').value;
        const serviceDescription = document.getElementById('serviceDescription').value;

        // Validate input fields
        if (!serviceTitle || !serviceDescription || serviceImages.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Please fill out all fields and select at least one image!',
                showConfirmButton: false,
                timer: 2000,
            });
            return;
        }

        let formData = new FormData();
        formData.append('title', serviceTitle);
        formData.append('description', serviceDescription);

        // Append all selected images to the FormData object
        for (const image of serviceImages) {
            formData.append('images[]', image); 
        }

        // Log the FormData object (for debugging purposes)
        console.log(formData);

        // Call API to create service
        const res = await axios.post("/service-create", formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        });

        if (res.data.status === "success") {
            document.getElementById("create-service-form").reset();
            document.getElementById('imagePreviewContainer').innerHTML = ""; // Clear image previews
            document.getElementById('modal-close').click();
            await getServiceData(); // Refresh service list (assumes this function exists)
            Swal.fire({ icon: 'success', title: res.data.message, timer: 2000 });
        } else {
            Swal.fire({ icon: 'error', title: res.data.message, timer: 2000 });
        }
    } catch (error) {
        console.error('Error creating service:', error);
        Swal.fire({ icon: 'error', title: 'Create failed', timer: 2000 });
    }
}

</script>
