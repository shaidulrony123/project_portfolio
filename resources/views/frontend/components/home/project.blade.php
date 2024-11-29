
<!-- Project Section -->
<section id="project">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wow fadeInLeft what-i-do">
                    <div class="wow fadeInUp what-top-text">
                        <h2>Featured Projects</h2>
                    </div>
                    <div class="wow fadeInUp what-text">
                        <p>My step-by-step guide ensures a smooth project journey, from the initial consultation to the final delivery. I take care of every detail, allowing you to focus on what you do best.</p>
                        <button class="main-btn mt-3">
                            View Portfolio
                            <div class="arrow-wrapper">
                                <div class="arrow"></div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="project-content">
            <div id="projectContainer" class="row">
                <!-- Dynamic Projects Will Be Injected Here -->
            </div>
            {{-- Load More Button --}}
            <div class="text-center mt-4">
                <button id="project-load-more" class="btn btn-primary d-none">Load More</button>
            </div>
            
        </div>
    </div>
</section>
<!-- Project Section -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Initialize variables
    let projectData = []; // Array to store fetched project data
    let itemsToShow = 4; // Number of items to display at a time
    let currentIndex = 0; // Track the current index of displayed items

    // Fetch project data from the backend
    async function getProjectData() {
        try {
            const response = await axios.get('/get-project-data');

            if (response.data.status === 'success') {
                projectData = response.data.projectDataList; // Store fetched data

                // Render initial set of items
                renderProjectItems();

                // Show "Load More" button if there are more items to load
                if (projectData.length > itemsToShow) {
                    document.getElementById('project-load-more').classList.remove('d-none');
                }
            } else {
                console.error('Error fetching project data:', response.data.message);
            }
        } catch (error) {
            console.error('Error fetching project data:', error);
        }
    }

    // Render project items dynamically
    function renderProjectItems() {
        const projectContainer = document.getElementById('projectContainer');

        // Ensure the container exists
        if (!projectContainer) {
            console.error('Project container not found!');
            return;
        }

        // Render the next set of items
        const items = projectData.slice(currentIndex, currentIndex + itemsToShow);
        items.forEach((item) => {
            // Ensure tags are handled correctly
            let tagsContent = '';
            if (Array.isArray(item.tags)) {
                tagsContent = item.tags.join(', '); // Join array elements with a comma
            } else if (typeof item.tags === 'string') {
                tagsContent = item.tags; // Use the string as is
            } else {
                tagsContent = 'No tags available'; // Default fallback
            }

            const projectHTML = `
            <div class="col-lg-3 col-md-4">
                <a href="${item.url}" target="_blank">
                    <div class="wow fadeInLeft project-inner mb-4" data-wow-delay=".2s">
                        <div class="project-img">
                            <img src="${item.image}" class="img-fluid w-100" alt="${item.name}">
                            <div class="project-details">
                                <h4>${item.name}</h4>
                                <p>${item.description}</p>
                                <p class="text-muted">${tagsContent}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            `;
            projectContainer.insertAdjacentHTML('beforeend', projectHTML);
        });

        // Update the current index
        currentIndex += itemsToShow;

        // Hide "Load More" button if all items are displayed
        if (currentIndex >= projectData.length) {
            document.getElementById('project-load-more').classList.add('d-none');
        }
    }

    // Event listener for "Load More" button
    const loadMoreBtn = document.getElementById('project-load-more');
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', renderProjectItems);
    } else {
        console.error('Load More button not found!');
    }

    // Fetch and render projects on page load
    getProjectData();
});


</script>
