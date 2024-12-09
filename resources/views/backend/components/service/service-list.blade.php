<div class="card">
    <div class="card-body">
        <div class="card-head d-flex justify-content-between mb-3">
            <h4 class="card-title">Service List</h4>
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
                        <th>Images</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tableList">
                    <!-- Rows will be inserted here by JavaScript -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    getServiceData();

    async function getServiceData() {
        try {
            let res = await axios.get('/service-list'); // Fetch data from the server
            let tableList = $("#tableList");
            $('#example').DataTable().destroy(); // Destroy existing DataTable
            tableList.empty(); // Clear the table

            res.data.rows.forEach(function (item, index) {
                // Loop through the images array and create <img> tags for each image
                let showingMultipleImage = '';
                let images = item.images; // Get the array of images

                // Check if images exist
                if (images && Array.isArray(images)) {
                    images.forEach(function (imageUrl) {
                        showingMultipleImage += `<img src="${imageUrl}" alt="Image" style="width: 50px; height: 50px; margin-right: 5px;">`;
                    });
                }

                // Create a new row with the images and other service data
                let row = `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${showingMultipleImage}</td> <!-- Display multiple images -->
                        <td>${item.title}</td>
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
                tableList.append(row); // Append the row to the table
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

            // Reinitialize DataTable after populating the rows
            new DataTable('#example', {
                order: [[0, 'desc']],
                lengthMenu: [10, 20, 50, 100],
            });
        } catch (error) {
            console.error('Error fetching service data:', error);
        }
    }
</script>
