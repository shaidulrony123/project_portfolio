<div class="modal fade" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class="mt-3 text-warning">Delete!</h3>
                <p class="mb-3">Once deleted, you can't get it back.</p>
                <input type="hidden" id="deleteID" />
            </div>
            <div class="modal-footer d-flex justify-content-end">
                <button type="button" id="delete-modal-close" class="btn btn-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button onclick="categoryDelete()" type="button" id="confirmDelete" class="btn btn-danger">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>


<script>
   async function categoryDelete() {
    const deleteButton = document.getElementById("confirmDelete");
    const deleteModalClose = document.getElementById("delete-modal-close");
    const deleteID = document.getElementById("deleteID").value;

    if (!deleteID) {
        Swal.fire({
            icon: "error",
            title: "Invalid operation",
            text: "No category selected for deletion.",
            timer: 2000,
        });
        return;
    }

    try {
        // Disable button to prevent duplicate clicks
        deleteButton.disabled = true;

        deleteModalClose.click(); // Close the modal
        showLoader(); // Show the loader

        const response = await axios.post("/category-delete", { id: deleteID });
        hideLoader(); // Hide the loader

        if (response.data.status === "success") {
            // Refresh category list
            await getCategoryData();

            Swal.fire({
                icon: "success",
                title: response.data.message || "Category deleted successfully!",
                timer: 2000,
            });
        } else {
            Swal.fire({
                icon: "error",
                title: response.data.message || "Failed to delete category.",
                timer: 2000,
            });
        }
    } catch (error) {
        hideLoader();

        console.error("Error deleting category:", error);
        Swal.fire({
            icon: "error",
            title: "An error occurred!",
            text: "Please try again later.",
            timer: 2000,
        });
    } finally {
        // Re-enable button after operation
        deleteButton.disabled = false;
    }
}

</script>
