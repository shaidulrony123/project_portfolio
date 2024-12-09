<div class="modal fade" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Product</h5>
                <button type="button" class="btn-close px-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create-product-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <img width="100px" height="100px" id="newProductImg" src="{{ asset('assets/images/default.jpg') }}" />
                                <br />
                                <label class="form-label mt-2">Image</label>
                                <input oninput="previewProductImg(event)" type="file" class="form-control" id="productImage" accept="image/*">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Name</label>
                                <input type="text" class="form-control" id="productName" placeholder="Enter product name">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Description</label>
                                <textarea class="form-control" id="productDescription" rows="3" placeholder="Enter product description"></textarea>
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Url</label>
                                <input type="text" class="form-control" id="productUrl" placeholder="Enter product url">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Price</label>
                                <input type="text" class="form-control" id="productPrice" placeholder="Enter product price">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="productCreate()" type="button" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>


<script>
 function previewProductImg(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('newProductImg');
    preview.src = file ? URL.createObjectURL(file) : "{{ asset('assets/images/default.jpg') }}";
}

async function productCreate() {
    try {
        const productImage = document.getElementById('productImage').files[0];
        const productName = document.getElementById('productName').value;
        const productDescription = document.getElementById('productDescription').value;
        const productUrl = document.getElementById('productUrl').value;
        const productPrice = document.getElementById('productPrice').value;

        // Validate input
        if (!productName || !productDescription || !productUrl || !productPrice) {
            Swal.fire({
                icon: 'warning',
                title: 'Please fill out all fields!',
                showConfirmButton: false,
                timer: 2000,
            });
            return;
        }

        let formData = new FormData();
        formData.append('name', productName);
        formData.append('description', productDescription);
        formData.append('url', productUrl);
        formData.append('price', productPrice);

        if (productImage) {
            formData.append('image', productImage);
        }

        // Show loader (if implemented)
        showLoader();

        const res = await axios.post("/product-create", formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        });

        hideLoader();

        if (res.data.status === "success") {
            // Reset form and preview image
            document.getElementById("create-product-form").reset();
            document.getElementById('newProductImg').src = "{{ asset('assets/images/default.jpg') }}";
            document.getElementById('modal-close').click();

            // Refresh product list
            await getProductData();

            Swal.fire({
                icon: 'success',
                title: res.data.message || 'Product created successfully!',
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
        console.error('Error creating product:', error);
        Swal.fire({
            icon: 'error',
            title: 'Create failed. Please try again.',
            timer: 2000,
        });
    }
}


</script>