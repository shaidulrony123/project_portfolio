<!-- Create Blog Modal -->
<div class="modal fade" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Blog</h5>
                <button type="button" class="btn-close px-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create-blog-form">
                    <div class="container">
                        <div class="row">
                              <!-- Image Upload -->
                              <div class="col-6 p-1">
                                  <label class="form-label mt-2">Image</label>
                                  <input oninput="previewBlogImg(event)" type="file" class="form-control" id="blogImage" accept="image/*">
                                  <img width="100px" height="100px" id="newBlogImg" src="{{ asset('assets/images/default.jpg') }}" />
                            </div>
                            <!-- Category Dropdown -->
                            <div class="col-6 p-1">
                                <label class="form-label mt-2">Category</label>
                                <select class="form-select" id="blogCategory">
                                    <!-- Categories will be populated dynamically -->
                                </select>
                            </div>
                          
                            <!-- Title -->
                            <div class="col-6 p-1">
                                <label class="form-label mt-2">Title</label>
                                <input type="text" class="form-control" id="blogTitle" placeholder="Enter blog title" />
                            </div>
                            <!-- Date -->
                            <div class="col-6 p-1">
                                <label class="form-label mt-2">Date</label>
                                <input type="date" class="form-control" id="blogDate" />
                            </div>
                            <!-- Description -->
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Description</label>
                                <textarea class="form-control" id="blogDescription" rows="3" placeholder="Enter blog description"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="blogCreate()" type="button" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Initialize Summernote for the description field
    $(document).ready(function () {
        $('#blogDescription').summernote({
            placeholder: 'Enter blog description',
            tabsize: 2,
            height: 150, // Set the height of the editor
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
        });
    });

    // Preview blog image
    function previewBlogImg(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('newBlogImg');
        preview.src = file ? URL.createObjectURL(file) : "{{ asset('assets/images/default.jpg') }}";
    }

    // Fetch categories from the server
    async function fetchCategories() {
        try {
            console.log('Fetching categories...');
            const response = await axios.get('/categories');
            console.log('Response:', response.data);

            if (response.data.status === 'success') {
                const categories = response.data.categories;
                const categoryDropdown = document.getElementById('blogCategory');

                categoryDropdown.innerHTML = ''; // Clear existing options

                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.textContent = 'Select a category';
                categoryDropdown.appendChild(defaultOption);

                categories.forEach((category) => {
                    const option = document.createElement('option');
                    option.value = category.id;
                    option.textContent = category.name;
                    categoryDropdown.appendChild(option);
                });

                if (categories.length === 0) {
                    const noOption = document.createElement('option');
                    noOption.textContent = 'No categories available';
                    noOption.disabled = true;
                    categoryDropdown.appendChild(noOption);
                }
            } else {
                console.error('Failed to fetch categories:', response.data.message);
            }
        } catch (error) {
            console.error('Error fetching categories:', error);
            Swal.fire({
                icon: 'error',
                title: 'Failed to load categories',
                text: 'Please try again later',
            });
        }
    }

    // Create blog
    async function blogCreate() {
        try {
            const blogCategory = document.getElementById('blogCategory').value;
            const blogImage = document.getElementById('blogImage').files[0];
            const blogTitle = document.getElementById('blogTitle').value;
            const blogDate = document.getElementById('blogDate').value;
            const blogDescription = $('#blogDescription').summernote('code');

            if (!blogCategory || !blogTitle || !blogDate || !blogDescription) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Please fill out all fields!',
                    timer: 2000,
                });
                return;
            }

            const formData = new FormData();
            formData.append('category_id', blogCategory);
            formData.append('title', blogTitle);
            formData.append('date', blogDate);
            formData.append('description', blogDescription);
            if (blogImage) formData.append('image', blogImage);

            showLoader();

            const response = await axios.post('/blog-create', formData, {
                headers: { 'Content-Type': 'multipart/form-data' },
            });

            hideLoader();

            if (response.data.status === 'success') {
                document.getElementById('create-blog-form').reset();
                document.getElementById('newBlogImg').src = "{{ asset('assets/images/default.jpg') }}";
                document.getElementById('modal-close').click();
                await getBlogData(); // Refresh data
                Swal.fire({ icon: 'success', title: response.data.message, timer: 2000 });
            } else {
                Swal.fire({ icon: 'error', title: response.data.message, timer: 2000 });
            }
        } catch (error) {
            hideLoader();
            console.error('Error creating blog:', error);
            Swal.fire({ icon: 'error', title: 'Create failed', timer: 2000 });
        }
    }

    // Load categories when modal is opened
    document.getElementById('create-modal').addEventListener('shown.bs.modal', fetchCategories);
</script>
