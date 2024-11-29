<!-- Create Blog Modal -->
<div class="modal fade" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Pricing</h5>
                <button type="button" class="btn-close px-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create-pricing-form">
                    <div class="container">
                        <div class="row">
                            
                         
                            <!-- Title -->
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Title</label>
                                <input type="text" class="form-control" id="pricingTitle" placeholder="Enter pricing title" />
                            </div>
                            <!-- Price -->
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Price</label>
                                <input type="text" class="form-control" id="pricingPrice" placeholder="Enter price" />
                            </div>
                            <!-- Description -->
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Description</label>
                                <textarea class="form-control" id="pricingDescription" rows="3" placeholder="Enter pricing description"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="pricingCreate()" type="button" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>

<script>
    

   


    // Create Pricing
    async function pricingCreate() {
        try {
            const pricingTitle = document.getElementById('pricingTitle').value;
            const pricingPrice = document.getElementById('pricingPrice').value;
            const pricingDescription = document.getElementById('pricingDescription').value;
            
          

            if (!pricingTitle || !pricingPrice || !pricingDescription) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Please fill out all fields!',
                    timer: 2000,
                });
                return;
            }

            const formData = new FormData();
            formData.append('title', pricingTitle);
            formData.append('price', pricingPrice);
            formData.append('description', pricingDescription);

            showLoader();

            const response = await axios.post('/pricing-create', formData, {
                headers: { 'Content-Type': 'multipart/form-data' },
                
            });

            hideLoader();

            if (response.data.status === 'success') {
                document.getElementById('create-pricing-form').reset();
            
                document.getElementById('modal-close').click();
                await getPricingData(); // Refresh data
                Swal.fire({ icon: 'success', title: response.data.message, timer: 2000 });
            } else {
                Swal.fire({ icon: 'error', title: response.data.message, timer: 2000 });
            }
        } catch (error) {
            hideLoader();
            console.error('Error creating pricing:', error);
            Swal.fire({ icon: 'error', title: 'Create failed', timer: 2000 });
        }
    }

    // Load categories when modal is opened
    document.getElementById('create-modal').addEventListener('shown.bs.modal', fetchCategories);
</script>
