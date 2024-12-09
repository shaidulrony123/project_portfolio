<div class="card">
    <div class="card-body">
        <div class="card-head d-flex justify-content-between mb-3">
            <h4 class="card-title">Contact List</h4>
           
        </div>
        <hr>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Category</th>
                        <th>Documentation</th>
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
    getContactData();
    async function getContactData() {
    try {
        let res = await axios.get('/contact-list');
        let tableList = $("#tableList");
        $('#example').DataTable().destroy(); // Destroy existing DataTable
        tableList.empty(); // Clear table

        res.data.rows.forEach(function (item, index) {
            let row = `
                <tr>
                    <td>${index + 1}</td>
                    <td>${item.name}</td>
                    <td>${item.email}</td>
                    <td>${item.phone}</td>
                    <td>${item.category.name}</td>
                   <td>
                        ${
                            item.documentation 
                            ? `<a href="${item.documentation}" class="btn btn-outline-primary" download>Download</a>` 
                            : 'No File'
                        }
                    </td>
                    <td>
                       
                         <button data-id="${item.id}" class="btn deleteBtn btn-outline-danger">
                            <i class="fadeIn animated bx bx-trash-alt"></i>
                        </button>

                    </td>
                </tr>
            `;
            tableList.append(row);
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
