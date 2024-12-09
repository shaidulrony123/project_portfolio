<div class="row">
    <!-- Profile Image and Password Change -->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                    <img style="width: 150px; height: 150px" src="{{ asset(Auth::user()->image) }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110" id="currentProfileImage">
                    <div class="mt-3">
                        <h4 id="user_name_display">{{ Auth::user()->name }}</h4>

                        <!-- Change Password Form -->
                        <div class="mt-3">
                            <h4>Change Password</h4>
                            <form id="changePasswordForm" onsubmit="return handleChangePassword(event)" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="currentPassword">Current Password</label>
                                    <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3 w-100">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- User Information Update -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <!-- Full Name -->
                <div class="row mb-3">
                    <div class="col-sm-3"><h6 class="mb-0">Full Name</h6></div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" id="updateUserName" value="{{ Auth::user()->name }}"/>
                    </div>
                </div>


                <!-- Email -->
                <div class="row mb-3">
                    <div class="col-sm-3"><h6 class="mb-0">Email</h6></div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" id="updateUserEmail" value="{{ Auth::user()->email }}"/>
                    </div>
                </div>



                <!-- Profile Image -->
                <div class="row mb-3">
                    <div class="col-sm-3"><h6 class="mb-0">Profile Image</h6></div>
                    <div class="col-sm-9 text-secondary">
                        <input type="file" class="form-control" id="updateUserImage" onchange="previewUpdateImage()"/>
                    </div>
                </div>

                <!-- Save Changes Button -->
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                        <input onclick="UpdateUserProfile()" type="button" class="btn btn-primary px-4" value="Save Changes" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Handle Change Password Form Submission
    async function handleChangePassword(event) {
        event.preventDefault();

        const currentPassword = document.getElementById('currentPassword').value;
        const newPassword = document.getElementById('password').value;
        const confirmPassword = document.getElementById('password_confirmation').value;

        let formData = new FormData();
        formData.append('currentPassword', currentPassword);
        formData.append('password', newPassword);
        formData.append('password_confirmation', confirmPassword);

        try {
            showLoader();
            const response = await axios.post("/change-password", formData);
            hideLoader();

            if (response.data.status === 'success') {
                Swal.fire({ icon: 'success', title: response.data.message, timer: 2000 });
                document.getElementById('changePasswordForm').reset();
            }
        } catch (error) {
            hideLoader();
            if (error.response && error.response.data.errors) {
                const errors = error.response.data.errors;
                let errorMsg = '';
                for (let key in errors) {
                    errorMsg += `${errors[key][0]}\n`;
                }
                Swal.fire({ icon: 'error', title: 'Validation Error', text: errorMsg });
            } else {
                Swal.fire({ icon: 'error', title: 'An error occurred', text: error.message });
            }
        }
    }

    // Handle User Profile Update
    async function UpdateUserProfile() {
        try {
            const updateUserName = document.getElementById('updateUserName').value;
            const updateUserEmail = document.getElementById('updateUserEmail').value;

            const updateUserImage = document.getElementById('updateUserImage').files[0];

            let formData = new FormData();
            formData.append('name', updateUserName);

            formData.append('email', updateUserEmail);

            if (updateUserImage) formData.append('image', updateUserImage);

            showLoader();
            const res = await axios.post("/profile-update", formData, { headers: { 'Content-Type': 'multipart/form-data' } });
            hideLoader();

            if (res.data.status === "success") {
                Swal.fire({ icon: 'success', title: res.data.message, timer: 2000 });
            } else {
                Swal.fire({ icon: 'error', title: res.data.message, timer: 10000 });
            }
        } catch (error) {
            hideLoader();
            Swal.fire({ icon: 'error', title: 'An error occurred', text: error.message });
        }
    }

    // Image Preview
    function previewUpdateImage() {
        const file = document.getElementById('updateUserImage').files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('currentProfileImage').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>
