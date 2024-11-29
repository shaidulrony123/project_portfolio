<div class="modal fade" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                <button type="button" class="btn-close px-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create-category-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Name</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="categoryName" 
                                    placeholder="Enter category name"
                                    required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="create-btn" onclick="categoryCreate()" type="button" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>



<script>
    

    async function categoryCreate() {
    const createBtn = document.getElementById("create-btn");
    const categoryName = document.getElementById("categoryName").value;

    // Validate input
    if (!categoryName.trim()) {
        Swal.fire({
            icon: 'warning',
            title: 'Please fill out all fields!',
            showConfirmButton: false,
            timer: 2000,
        });
        return;
    }

    try {
        // Disable button to prevent duplicate submissions
        createBtn.disabled = true;

        const formData = new FormData();
        formData.append('name', categoryName);

        showLoader();

        const res = await axios.post("/category-create", formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        });

        hideLoader();

        if (res.data.status === "success") {
            document.getElementById("create-category-form").reset();
            document.getElementById('modal-close').click();

            await getCategoryData(); // Refresh the category list
            Swal.fire({
                icon: 'success',
                title: res.data.message || 'Category created successfully!',
                timer: 2000,
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: res.data.message || 'Something went wrong!',
                timer: 2000,
            });
        }
    } catch (error) {
        hideLoader();
        console.error('Error creating category:', error);

        const errorMsg = error.response?.data?.message || 'Failed to create category. Please try again.';
        Swal.fire({
            icon: 'error',
            title: errorMsg,
            timer: 2000,
        });
    } finally {
        createBtn.disabled = false; // Re-enable button after completion
    }
}



</script>