<!-- What I do -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="what-i-do">
                    <div class="wow fadeInUp what-top-text">
                        <h2>What I do</h2>
                    </div>
                    <div class="wow fadeInUp what-text">
                        <p>
                            I have more than 10 years' experience building software for clients all over the world. Below is a quick overview of my main technical skill sets and technologies I use. Want to find out more about my experience? Check out my online resume and project portfolio.
                        </p>
                        <button class="main-btn" id="seeAllArticlesBtn">

                            <a class="text-white" href="{{ url('/get-resume') }}">View Resume</a>
                            <div class="arrow-wrapper">
                                <div class="arrow"></div>
                            </div>
                        </button>
                    </div>
                    <div id="serviceContainer" class="row">
                        <!-- Dynamic Service Items Will Be Injected Here -->
                    </div>
                    <div class="text-center mt-4 mb-4">
                        <button id="loadMoreBtn" class="btn btn-primary d-none">Load More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- What I do -->

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const button = document.getElementById('seeAllArticlesBtn');
        const currentUrl = window.location.pathname; // Get the current path, e.g., "/get-blog"

        // Hide "See All Articles" button on `/get-blog` page
        if (currentUrl === '/get-service') {
            button.classList.add('d-none'); // Use Bootstrap's d-none class
        } else {
            button.classList.remove('d-none');
        }
    });
    let serviceData = []; // Array to store fetched service data
    let itemsToShow = 4; // Number of items to display at a time
    let currentIndex = 0; // Track the current index of displayed items

    async function getServiceData() {
        try {
            // Fetch service data from the backend
            const response = await axios.get('/get-service-data');

            // Check for successful response
            if (response.data.status === 'success') {
                serviceData = response.data.serviceDataList; // Store fetched data

                // Render initial set of items
                renderServiceItems();

                // Show "Load More" button if there are more items to load
                if (serviceData.length > itemsToShow) {
                    document.getElementById('loadMoreBtn').classList.remove('d-none');
                }
            } else {
                console.error('Error fetching service data:', response.data.message);
            }
        } catch (error) {
            console.error('Error fetching service data:', error);
        }
    }

    function renderServiceItems() {
    const serviceContainer = document.getElementById('serviceContainer');

    // Render next set of items
    const items = serviceData.slice(currentIndex, currentIndex + itemsToShow);
    items.forEach((item) => {
        const serviceHTML = `
            <div class="col-lg-3 col-md-6 mt-5">
                <div class="wow fadeInUp service-item" data-wow-delay=".2s">
                    <div class="service-images d-flex gap-2">
                        ${item.images.map(image => `
                            <img src="${image}" alt="Service Image">
                        `).join('')}
                    </div>
                    <h3>${item.title}</h3>
                    <p>${item.description}</p>

                </div>
            </div>
        `;
        serviceContainer.insertAdjacentHTML('beforeend', serviceHTML);
    });

    // Update the current index
    currentIndex += itemsToShow;

    // Hide "Load More" button if all items are displayed
    if (currentIndex >= serviceData.length) {
        document.getElementById('loadMoreBtn').classList.add('d-none');
    }
}


    // Event listener for "Load More" button
    document.getElementById('loadMoreBtn').addEventListener('click', renderServiceItems);

    // Fetch and render services on page load
    getServiceData();
</script>
