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
                                <img width="100px" height="100px" id="newServiceImg" src="{{ asset('assets/images/default.jpg') }}" />
                                <br />
                                <label class="form-label mt-2">Image</label>
                                <input oninput="previewServiceImg(event)" type="file" class="form-control" id="serviceImage" accept="image/*">
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
    function previewServiceImg(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('newServiceImg');
    preview.src = file ? URL.createObjectURL(file) : "{{ asset('assets/images/default.jpg') }}";
}

async function serviceCreate() {
    try {
        const serviceImage = document.getElementById('serviceImage').files[0];
        const serviceTitle = document.getElementById('serviceTitle').value;
        const serviceDescription = document.getElementById('serviceDescription').value;

        // Validate input
        if (!serviceTitle || !serviceDescription) {
            Swal.fire({
                icon: 'warning',
                title: 'Please fill out all fields!',
                showConfirmButton: false,
                timer: 2000,
            });
            return;
        }

        let formData = new FormData();
        formData.append('title', serviceTitle);
        formData.append('description', serviceDescription);
        if (serviceImage) {
            formData.append('image', serviceImage);
        }

        // Show loader if implemented
        showLoader();

        const res = await axios.post("/service-create", formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        });

        hideLoader();

        if (res.data.status === "success") {
            document.getElementById("create-service-form").reset();
            document.getElementById('newServiceImg').src = "{{ asset('assets/images/default.jpg') }}";
            document.getElementById('modal-close').click();

            await getServiceData(); // Refresh service list
            Swal.fire({ icon: 'success', title: res.data.message, timer: 2000 }); // Updated
        } else {
            Swal.fire({ icon: 'error', title: res.data.message, timer: 2000 }); // Updated
        }
    } catch (error) {
        hideLoader();
        console.error('Error creating service:', error);
        Swal.fire({ icon: 'error', title: 'Create failed', timer: 2000 });
    }
}


</script>