<div class="modal fade" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Project</h5>
                <button type="button" class="btn-close px-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create-project-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <img width="100px" height="100px" id="newProjectImg" src="{{ asset('assets/images/default.jpg') }}" />
                                <br />
                                <label class="form-label mt-2">Image</label>
                                <input oninput="previewProjectImg(event)" type="file" class="form-control" id="projectImage" accept="image/*">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Name</label>
                                <input type="text" class="form-control" id="projectName" placeholder="Enter project name">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Description</label>
                                <textarea class="form-control" id="projectDescription" rows="3" placeholder="Enter project description"></textarea>
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Url</label>
                                <input type="text" class="form-control" id="projectUrl" placeholder="Enter project url">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Tags</label>
                                <input type="text" class="form-control" id="projectTags" placeholder="Enter project tags">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="projectCreate()" type="button" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>


<script>
    function previewProjectImg(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('newProjectImg');
    preview.src = file ? URL.createObjectURL(file) : "{{ asset('assets/images/default.jpg') }}";
}

async function projectCreate() {
    try {
        const projectImage = document.getElementById('projectImage').files[0];
        const projectName = document.getElementById('projectName').value;
        const projectDescription = document.getElementById('projectDescription').value;
        const projectUrl = document.getElementById('projectUrl').value;
        const projectTags = document.getElementById('projectTags').value;

        // Validate input
        if (!projectName || !projectDescription || !projectUrl || !projectTags) {
            Swal.fire({
                icon: 'warning',
                title: 'Please fill out all fields!',
                showConfirmButton: false,
                timer: 2000,
            });
            return;
        }

        let formData = new FormData();
        formData.append('name', projectName);
        formData.append('description', projectDescription);
        formData.append('url', projectUrl);
        formData.append('tags', projectTags);
        if (projectImage) {
            formData.append('image', projectImage);
        }

        // Show loader if implemented
        showLoader();

        const res = await axios.post("/project-create", formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        });

        hideLoader();

        if (res.data.status === "success") {
            document.getElementById("create-project-form").reset();
            document.getElementById('newProjectImg').src = "{{ asset('assets/images/default.jpg') }}";
            document.getElementById('modal-close').click();

            await getProjectData(); // Refresh project list
            Swal.fire({ icon: 'success', title: res.data.message, timer: 2000 }); // Updated
        } else {
            Swal.fire({ icon: 'error', title: res.data.message, timer: 2000 }); // Updated
        }
    } catch (error) {
        hideLoader();
        console.error('Error creating project:', error);
        Swal.fire({ icon: 'error', title: 'Create failed', timer: 2000 });
    }
}


</script>