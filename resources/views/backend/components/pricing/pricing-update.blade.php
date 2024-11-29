<div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pricing</h5>
                <button type="button" class="btn-close px-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">

                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Title</label>
                                <input type="text" class="form-control" id="pricingTitleUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Price</label>
                                <input type="text" class="form-control" id="pricingPriceUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Description</label>
                                <input type="text" class="form-control" id="pricingDescriptionUpdate">
                            </div>


                            <input class="d-none" id="updateID">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button onclick="pricingUpdate()" type="button" class="btn btn-success">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function FillUpUpdateForm(id) {
        document.getElementById('updateID').value = id;

        try {
            let response = await axios.post('/pricing-by-id', {
                id: id
            });
            if (response.data.status === 'success') {
                let pricing = response.data.pricing;

                document.getElementById('pricingTitleUpdate').value = pricing.title;
                document.getElementById('pricingPriceUpdate').value = pricing.price;
                document.getElementById('pricingDescriptionUpdate').value = pricing.description;
               
            } else {
                console.error('Failed to fetch sidebar details:', response.data.message);
            }
        } catch (error) {
            console.error('Error fetching sidebar details:', error);
        }
    }


    async function pricingUpdate() {
        let formData = new FormData();

        formData.append('id', document.getElementById('updateID').value);
        formData.append('title', document.getElementById('pricingTitleUpdate').value);
        formData.append('price', document.getElementById('pricingPriceUpdate').value);
        formData.append('description', document.getElementById('pricingDescriptionUpdate').value);
   

       

        try {
            let response = await axios.post('/pricing-update', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
            });

            if (response.data.status === 'success') {
                // Refresh the sidebar data (or any other UI refresh)
                await getPricingData();

                // Show success notification
                Swal.fire({
                    icon: 'success',
                    title: response.data.message,
                    timer: 2000
                });

                // Close the modal programmatically
                const updateModal = document.getElementById('update-modal');
                const modalInstance = bootstrap.Modal.getInstance(updateModal);
                modalInstance.hide();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: response.data.message,
                    timer: 2000
                });
            }
        } catch (error) {
            console.error('Error updating sidebar:', error);
            Swal.fire({
                icon: 'error',
                title: 'Update failed',
                timer: 2000
            });
        }
    }

</script>