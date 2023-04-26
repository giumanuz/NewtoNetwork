<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    

<title>
  Create Post
</title>
</head>

    <?php
    
        include "navigationBar.php";
        if (isset($_GET['status'])) {
            if ($_GET['status'] == "errorFileExists") {
                echo "<div class='alert alert-danger' role='alert'>Sorry, file already exists.</div>";
            }
            if ($_GET['status'] == "errorFileFormat") {
                echo "<div class='alert alert-danger' role='alert'>Sorry, only JPG, JPEG files are allowed.</div>";
            }
            if ($_GET['status'] == "errorFakeImage") {
                echo "<div class='alert alert-danger' role='alert'>Sorry, your file is not an image.</div>";
            }
            if ($_GET['status'] == "errorSize") {
                echo "<div class='alert alert-danger' role='alert'>Sorry, your file is too large.</div>";
            }
            if ($_GET['status'] == "errorUpload") {
                echo "<div class='alert alert-danger' role='alert'>Sorry, there was an error uploading your file.</div>";
            }
        }
    ?>

        
<body>

    <div class="container">
        <div class="content">

            <form action="/script/backPost.php" method="post" enctype="multipart/form-data">
                <div class="user-details">
                    <div class="input-box">
                        <label>
                            <span class="details">Content</span>
                            <input type="textarea" placeholder="Insert the content" name="content" required>
                        </label>
                    </div>
                    <div class="input-box">
                        <label>
                            <span class="details">Select photo to upload</span>
                            <input type="file" name="photo" id="photo">
                        </label>
                    </div>
                </div>

                <div class="button">
                    <input type="submit" value="Add Post">
                </div>
            </form>
        </div>
    </div>
</body>
</html>