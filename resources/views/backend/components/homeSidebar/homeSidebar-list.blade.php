<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Github</th>
                        <th>Twitter</th>
                        <th>Linkedin</th>
                        <th>Facebook</th>
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
    getSidebarData();
    async function getSidebarData() {
    try {
        let res = await axios.get('/home-sidebar-list');
        let tableList = $("#tableList");
        $('#example').DataTable().destroy(); // Destroy existing DataTable
        tableList.empty(); // Clear table

        res.data.rows.forEach(function (item, index) {
            let row = `
                <tr>
                    <td>${index + 1}</td>
                    <td><img src="${item.image}" alt="Image" style="width: 50px; height: 50px;"></td>
                    <td>${item.name}</td>
                    <td>${item.slug}</td>
                    <td>${item.github_link}</td>
                    <td>${item.twitter_link}</td>
                    <td>${item.linkedin_link}</td>
                    <td>${item.facebook_link}</td>
                    <td>
                        <button data-id="${item.id}" class="btn editBtn btn-secondary">
                            <i class="fadeIn animated bx bx-edit"></i>
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
