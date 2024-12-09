<!-- Contact Section -->
<section>
  <div class="container py-5">
      <div class="row">
          <div class="col-lg-12 mb-3">
              <h2>Get In Touch</h2>
              <p>Please fill out the form below to get in touch with me. I will get back to you as soon as possible.</p>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-12">
              <form id="create-contact-form">
                  <div class="mb-3">
                      <label for="categoryDropdown" class="form-label">Select a Category</label>
                      <select id="categoryDropdown" class="form-select form-control" required>
                          <option selected disabled>-- Please choose an option --</option>
                      </select>
                  </div>
                  <div class="row">
                      <div class="col-md-6 mb-3">
                          <label for="contactName" class="form-label">Name *</label>
                          <input type="text" class="form-control" id="contactName" placeholder="Enter your name" required />
                      </div>
                      <div class="col-md-6 mb-3">
                          <label for="contactEmail" class="form-label">Email *</label>
                          <input type="email" class="form-control" placeholder="Enter your email" id="contactEmail" required />
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="ContactProjectFile" class="form-label">Project Documentation *</label>
                      <input type="file" class="form-control" id="ContactProjectFile" required accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" />
                  </div>

                      <div class="col-md-6 mb-3">
                          <label for="contactPhone" class="form-label">Phone</label>
                          <input type="tel" class="form-control" placeholder="(+880) 1XXX-XXXXXX" id="contactPhone" />
                      </div>
                  </div>
                  <div class="mb-3">
                      <label for="contactMessage" class="form-label">Message</label>
                      <textarea id="contactMessage" rows="4" placeholder="Enter your message" class="form-control"></textarea>
                  </div>
                  <div class="d-flex justify-content-between">
                      <button type="reset" class="btn btn-secondary">Reset</button>
                      <button id="create-btn" type="button" onclick="contactCreate()" class="btn btn-primary">Submit</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</section>

<script>
// Fetch categories and populate the dropdown
async function populateCategories() {
    try {
        const res = await axios.get('/contact-categories');
        const dropdown = document.getElementById("categoryDropdown");
        dropdown.innerHTML = '<option selected disabled>-- Please choose an option --</option>';

        res.data.forEach((category) => {
            const option = document.createElement("option");
            option.value = category.id;
            option.textContent = category.name;
            dropdown.appendChild(option);
        });
    } catch (error) {
        console.error('Error fetching categories:', error);
        Swal.fire({
            icon: 'error',
            title: 'Failed to load categories.',
            text: 'Please try again later.',
        });
    }
}

// Submit the contact form
async function contactCreate() {
    const contactName = document.getElementById("contactName").value.trim();
    const contactEmail = document.getElementById("contactEmail").value.trim();
    const contactPhone = document.getElementById("contactPhone").value.trim();
    const contactMessage = document.getElementById("contactMessage").value.trim();
    const contactProjectFile = document.getElementById("ContactProjectFile").files[0];
    const categoryId = document.getElementById("categoryDropdown").value;

    console.log('Form Data:', {
        contactName,
        contactEmail,
        contactPhone,
        contactMessage,
        contactProjectFile,
        categoryId
    });

    if (!categoryId || !contactName || !contactEmail || !contactProjectFile) {
        Swal.fire({
            icon: 'warning',
            title: 'Please fill out all required fields!',
        });
        return;
    }

    try {
        const formData = new FormData();
        formData.append('name', contactName);
        formData.append('email', contactEmail);
        formData.append('phone', contactPhone);
        formData.append('message', contactMessage);
        formData.append('documentation', contactProjectFile);
        formData.append('category_id', categoryId);

        const res = await axios.post('/contact-create', formData, {
            headers: { 'Content-Type': 'multipart/form-data' },
        });

        console.log(res.data); // Log server response

        if (res.data.status === "success") {
            document.getElementById("create-contact-form").reset(); // Reset the form
            document.getElementById("categoryDropdown").selectedIndex = 0; // Reset category dropdown
            Swal.fire({
                icon: 'success',
                title: 'Contact request submitted successfully!',
            });
        } else {
            throw new Error(res.data.message || 'Something went wrong.');
        }
    } catch (error) {
        console.error('Error submitting form:', error);
        Swal.fire({
            icon: 'error',
            title: 'Failed to submit the form. Please try again.',
            text: error.response ? error.response.data.message : '',
        });
    }
}

// Populate categories on page load
document.addEventListener("DOMContentLoaded", populateCategories);
</script>
