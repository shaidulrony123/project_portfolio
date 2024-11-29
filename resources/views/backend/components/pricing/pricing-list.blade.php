<div class="card">
    <div class="card-body">
        <div class="card-head d-flex justify-content-between mb-3">
            <h4 class="card-title">Pricing List</h4>
            <div class="card-options">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-modal">Add New</a>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tableList">

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    getPricingData();
    async function getPricingData() {
    try {
        let res = await axios.get('/pricing-list');
        let tableList = $("#tableList");
        $('#example').DataTable().destroy(); // Destroy existing DataTable
        tableList.empty(); // Clear table

        res.data.rows.forEach(function (item, index) {
            let row = `
                <tr>
                    <td>${index + 1}</td>
                    <td>${item.title}</td>
                    <td>${item.price}</td>
                    <td>${item.description}</td>
                    <td>
                        <button data-id="${item.id}" class="btn editBtn btn-outline-secondary">
                            <i class="fadeIn animated bx bx-edit"></i>
                        </button>
                         <button data-id="${item.id}" class="btn deleteBtn btn-outline-danger">
                            <i class="fadeIn animated bx bx-trash-alt"></i>
                        </button>

                    </td>
                </tr>
            `;
            tableList.append(row);
        });

        $('.editBtn').on('click', async function () {
            let id = $(this).data('id');
            await FillUpUpdateForm(id);
            $("#update-modal").modal('show');
        });

        $('.deleteBtn').on('click', function () {
            let id = $(this).data('id');
            $("#delete-modal").modal('show');
            $("#deleteID").val(id);
        });

        // Reinitialize DataTable
        new DataTable('#example', {
            order: [[0, 'desc']],
            lengthMenu: [10, 20, 50, 100],
        });
    } catch (error) {
        console.error('Error fetching sidebar data:', error);
    }
}


</script>
