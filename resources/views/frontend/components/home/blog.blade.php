<section id="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wow fadeInLeft what-i-do">
                    <div class="wow fadeInUp what-top-text ">
                        <h2>Latest Blog Posts</h2>

                    </div>
                    <div class="wow fadeInUp what-text">
                        <p>More than 1500+ agencies using Portfolify</p>
                        <button class="main-btn mt-3" id="seeAllArticlesBtn">

                            <a class="text-white" href="{{url('/get-blog')}}">See All Articles</a>
                            <div class="arrow-wrapper">
                                <div class="arrow"></div>

                            </div>
                        </button>
                    </div>
                  </div>
            </div>
        </div>
        <div class="bolg-inner">
            <div id="blogContainer" class="row"></div>
            <!-- Load More Button -->
            <div class="text-center mt-4">
                <button id="loadMoreBtn" class="btn btn-primary d-none">Load More</button>
            </div>
        </div>
    </div>
 </section>
<!-- blog section -->


<script>
    document.addEventListener('DOMContentLoaded', () => {
        
        const button = document.getElementById('seeAllArticlesBtn');
        const currentUrl = window.location.pathname; // Get the current path, e.g., "/get-blog"

        // Hide "See All Articles" button on `/get-blog` page
        if (currentUrl === '/get-blog') {
            button.classList.add('d-none'); // Use Bootstrap's d-none class
        } else {
            button.classList.remove('d-none');
        }
    });

    // Blog Data Fetch and Render Logic
    let blogData = []; // Array to store fetched blog data
    let itemsToShow = 4; // Number of items to display at a time
    let currentIndex = 0; // Track the current index of displayed items

    async function getBlogData() {
        try {
            const response = await axios.get('/get-blog-data'); // Fetch blog data
            if (response.data.status === 'success') {
                blogData = response.data.blogDataList; // Store fetched data
                renderBlogItems(); // Render initial items
                if (blogData.length > itemsToShow) {
                    document.getElementById('loadMoreBtn').classList.remove('d-none'); // Show Load More button
                }
            } else {
                console.error('Error fetching blog data:', response.data.message);
            }
        } catch (error) {
            console.error('Error fetching blog data:', error);
        }
    }

    function renderBlogItems() {
        const blogContainer = document.getElementById('blogContainer');
        const items = blogData.slice(currentIndex, currentIndex + itemsToShow);

        // Append items dynamically to the container
        items.forEach((item) => {
            const blogHTML = `
                <div class="col-lg-4 col-md-6">
                    <div class="wow fadeInLeft blog-content">
                        <div class="blog-img">
                            <img src="frontend/assets/images/blog/${item.image}" class="img-fluid w-100" alt="${item.title}">
                        </div>
                        <div class="blog-text">
                            <p>${item.date} / ${item.category.name}</p>
                            <h4>${item.title}</h4>
                        </div>
                    </div>
                </div>
            `;
            blogContainer.insertAdjacentHTML('beforeend', blogHTML);
        });

        currentIndex += itemsToShow; // Update current index

        // Hide "Load More" button if all items are displayed
        if (currentIndex >= blogData.length) {
            document.getElementById('loadMoreBtn').classList.add('d-none');
        }
    }

    // Event listener for "Load More" button
    document.getElementById('loadMoreBtn').addEventListener('click', renderBlogItems);

    // Fetch and display blogs on page load
    getBlogData();
</script>
