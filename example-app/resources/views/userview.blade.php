<html>
    <head>
        <title>Form</title>
    </head>

    <body>
        <form action="" method="POST" id="myForm">
            <h4>Name</h4>
            <input type="text" name="Name">
            <br><br>
            <h4>Age</h4>
            <input type="number" name="Age" min="1" max="99">
            <br><br>
            <h4>Shoe size</h4>
            <input type="number" name="Shoe Size" step="0.01" min="2.50" max="99.99">
            <br><br>
            <h4>Gender</h4>
            <select name="Gender">
                <option value="Woman">Woman</option>
                <option value="Man">Man</option>
            </select>
            <br><br>
            <h4>Email</h4>
            <input type="text" name="email">
            <br><br>
            <h4>Address</h4>
            <input type="text" name="Address">
            <br><br>
            <button type="submit">Submit</button>
        </form>
        <form action="/upload" method="post" id="uploadForm">
            <input type="file" id="photo" name="photo">
            <input type="submit" name="upload">
        </form>

        <div id="successMessage" style="display: none;">
            <h3>Form submitted successfully!</h3>
            <p>Thank you for your submission.</p>
        </div>

        <div id="failedMessage" style="display: none;">
            <h3>Form submission failed!</h3>
            <p>Please fill in all the required fields.</p>
        </div>

        <div id="imagePreview" style="display: none;">
            <h3>Uploaded Image:</h3>
            <img id="preview" src="" alt="Image preview">
        </div>

        <script>
            var form = document.getElementById('myForm');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                var nameInput = document.getElementsByName('Name')[0];
                var ageInput = document.getElementsByName('Age')[0];
                var shoeSizeInput = document.getElementsByName('Shoe Size')[0];
                var genderInput = document.getElementsByName('Gender')[0];
                var emailInput = document.getElementsByName('email')[0];
                var addressInput = document.getElementsByName('Address')[0];

                if (nameInput.value === '' || ageInput.value === '' || shoeSizeInput.value === '' || genderInput.value === '' || emailInput.value === '' || addressInput.value === '') {
                    var failedMessage = document.getElementById('failedMessage');
                    failedMessage.style.display = 'block';
                    return;
                }

                // Perform form submission logic here
                var successMessage = document.getElementById('successMessage');
                successMessage.style.display = 'block';
                var failedMessage = document.getElementById('failedMessage');
                failedMessage.style.display = 'none';
            });

            var uploadForm = document.getElementById('uploadForm');
            uploadForm.addEventListener('submit', function(event) {
                event.preventDefault();
                var fileInput = document.getElementById('photo');
                var filePath = fileInput.value;
                var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
                if (!allowedExtensions.exec(filePath)) {
                    alert('Please upload file having extensions .jpeg/.jpg/.png only.');
                    fileInput.value = '';
                    return false;
                } else {
                    if (fileInput.files[0].size > 2097152) {
                        alert('File size must be less than 2 MB.');
                        fileInput.value = '';
                        return false;
                    }
                }

                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').style.display = 'block';
                    document.getElementById('preview').src = e.target.result;
                }
                reader.readAsDataURL(fileInput.files[0]);
            });
        </script>
    </body>
</html>
