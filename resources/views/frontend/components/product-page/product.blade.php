<!-- Portfolio Banner Section -->
<section id="common-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wow fadeInUp portfolio-banner-content text-center">
                    <h2>Check Out What I've Created for You</h2>
                    <p>Explore a collection of projects where creativity meets code. From sleek, responsive designs to intuitive user experiences, each project represents a unique solution tailored to meet client needs. Dive in to see how ideas transform into digital realities.</p>
                    <button class="main-btn mt-3">

                        <a class="text-white" href="{{url('/get-contact')}}">Hire Me</a>
                        <div class="arrow-wrapper">
                            <div class="arrow"></div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio Banner Section -->

<!-- Product Section -->
<section id="product">
    <div class="container">
        <div id="productContainer" class="row"></div>
        <div class="text-center mt-4">
            <button id="product-load-more" class="btn btn-primary d-none">Load More</button>
        </div>
    </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Initialize variables
        let productData = []; // Store fetched product data
        let itemsToShow = 4; // Number of items to display per batch
        let currentIndex = 0; // Track the current index of displayed items

        const productContainer = document.getElementById('productContainer');
        const loadMoreBtn = document.getElementById('product-load-more');

        // Fetch product data
        async function fetchProductData() {
            try {
                const response = await axios.get('/get-product-data');
                if (response.data.status === 'success') {
                    productData = response.data.productDataList;
                    renderProducts(); // Render initial items
                    if (productData.length > itemsToShow) loadMoreBtn.classList.remove('d-none'); // Show "Load More" button
                } else {
                    alert('Error fetching products.');
                }
            } catch (error) {
                alert('Failed to fetch product data. Try again.');
            }
        }

        // Render product items
        function renderProducts() {
            const items = productData.slice(currentIndex, currentIndex + itemsToShow);
            items.forEach((item) => {
                const productHTML = `
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <img src="${item.image}" class="card-img-top" alt="${item.title}">
                            <div class="card-body">
                                <h5 class="card-title">${item.title || 'No Title'}</h5>
                                <p class="card-text">${item.description || 'No Description'}</p>
                                <div class="d-flex justify-content-between mt-2">
                                    <a href="${item.url}" target="_blank" class="btn btn-sm btn-outline-primary">Live Preview</a>
                                    <a href="{{ url('/get-contact') }}" target="_blank" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-bangladeshi-taka-sign"></i> ${item.price}</a>

                                </div>
                            </div>
                        </div>
                    </div>`;
                productContainer.insertAdjacentHTML('beforeend', productHTML);
            });

            currentIndex += itemsToShow; // Update current index
            if (currentIndex >= productData.length) loadMoreBtn.classList.add('d-none'); // Hide "Load More" button if all items are displayed
        }

        // Event listener for "Load More" button
        loadMoreBtn.addEventListener('click', renderProducts);

        // Initialize and fetch data
        fetchProductData();
    });
    </script>
