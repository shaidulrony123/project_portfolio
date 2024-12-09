<div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                <button type="button" class="btn-close px-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Image</label>
                                <input type="file" class="form-control" id="productImageUpdate">
                                <img id="imagePreview" src="{{ asset('images/default.png') }}" style="width: 100px; height: 100px; margin-top: 10px;">
                                <input type="hidden" id="existingImagePath">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Name</label>
                                <input type="text" class="form-control" id="productNameUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Description</label>
                                <textarea class="form-control" id="productDescriptionUpdate" rows="3"></textarea>
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Url</label>
                                <input type="text" class="form-control" id="productUrlUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Price</label>
                                <input type="text" class="form-control" id="productPriceUpdate">
                            </div>
                            <input class="d-none" id="updateID">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="productUpdate()" type="button" class="btn btn-success">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
   // Populate Update Form
async function FillUpUpdateForm(id) {
    document.getElementById('updateID').value = id;

    try {
        // Fetch product details by ID
        let response = await axios.post('/product-by-id', { id: id });
        if (response.data.status === 'success') {
            const product = response.data.product;

            // Populate form fields
            document.getElementById('productNameUpdate').value = product.name;
            document.getElementById('productDescriptionUpdate').value = product.description;
            document.getElementById('productUrlUpdate').value = product.url;
            document.getElementById('productPriceUpdate').value = product.price;

            // Populate image fields
            const existingImage = product.image || '/images/default.png';
            document.getElementById('existingImagePath').value = existingImage;
            document.getElementById('imagePreview').src = existingImage;
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.data.message || 'Failed to fetch product details.',
            });
        }
    } catch (error) {
        console.error('Error fetching product details:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'An error occurred while fetching product details. Please try again.',
        });
    }
}

// Preview Image Update
document.getElementById('productImageUpdate').addEventListener('change', (event) => {
    const file = event.target.files[0];
    const preview = document.getElementById('imagePreview');
    preview.src = file ? URL.createObjectURL(file) : document.getElementById('existingImagePath').value;
});

// Update Product
async function productUpdate() {
    const formData = new FormData();

    // Append form data
    formData.append('id', document.getElementById('updateID').value);
    formData.append('name', document.getElementById('productNameUpdate').value.trim());
    formData.append('description', document.getElementById('productDescriptionUpdate').value.trim());
    formData.append('url', document.getElementById('productUrlUpdate').value.trim());
    formData.append('price', document.getElementById('productPriceUpdate').value.trim());

    // Append image if updated
    const newImage = document.getElementById('productImageUpdate').files[0];
    if (newImage) {
        formData.append('image', newImage);
    } else {
        formData.append('existing_image', document.getElementById('existingImagePath').value);
    }

    try {
        // Send update request
        let response = await axios.post('/product-update', formData, {
            headers: { 'Content-Type': 'multipart/form-data' },
        });

        if (response.data.status === 'success') {
            // Refresh product list
            await getProductData();

            // Show success notification
            Swal.fire({
                icon: 'success',
                title: response.data.message || 'Product updated successfully!',
                timer: 2000,
            });

            // Close the modal
            const updateModal = document.getElementById('update-modal');
            const modalInstance = bootstrap.Modal.getInstance(updateModal);
            modalInstance.hide();
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.data.message || 'Failed to update product.',
            });
        }
    } catch (error) {
        console.error('Error updating product:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'An error occurred while updating the product. Please try again.',
        });
    }
}

</script>
