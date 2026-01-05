<?php
include('connection.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collecting form data with security measures
    $name = htmlspecialchars($_POST['name']);
    $category = htmlspecialchars($_POST['category']);
    $appearance = htmlspecialchars($_POST['appearance']);
    $flavour = htmlspecialchars($_POST['flavour']);
    $texture = htmlspecialchars($_POST['texture']);
    $ingredient = htmlspecialchars($_POST['ingredient']);
    $tags = htmlspecialchars($_POST['tags']);
    $detail1 = htmlspecialchars($_POST['detail1']);
    $detail2 = htmlspecialchars($_POST['detail2']);
    $detail3 = htmlspecialchars($_POST['detail3']);
    $description = htmlspecialchars($_POST['description']);
    $selectedTable = htmlspecialchars($_POST['selected_table']); // Dropdown-selected table

    // Handling image upload
    $targetDir = "image/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true); // Create the directory if it doesn't exist
    }

    function uploadImage($fileKey, $targetDir) {
        if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] == UPLOAD_ERR_OK) {
            $uniqueFileName = uniqid() . "-" . basename($_FILES[$fileKey]["name"]);
            $targetFile = $targetDir . $uniqueFileName;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            $check = getimagesize($_FILES[$fileKey]["tmp_name"]);
            if ($check === false) {
                echo "<div class='alert alert-danger'>File {$fileKey} is not an image.</div>";
                return null;
            }

            if ($_FILES[$fileKey]["size"] > 600000) {
                echo "<div class='alert alert-danger'>File {$fileKey} is too large.</div>";
                return null;
            }

            $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($imageFileType, $allowedFormats)) {
                echo "<div class='alert alert-danger'>File {$fileKey} has an invalid format.</div>";
                return null;
            }

            if (move_uploaded_file($_FILES[$fileKey]["tmp_name"], $targetFile)) {
                return $targetFile;
            } else {
                echo "<div class='alert alert-danger'>Failed to upload file {$fileKey}.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>File {$fileKey} was not uploaded correctly.</div>";
        }
        return null;
    }

    $image = uploadImage("image", $targetDir);
    $image1 = uploadImage("image1", $targetDir);
    $image2 = uploadImage("image2", $targetDir);

    $conn->begin_transaction();
    try {
        // Define statements for each table
        if ($selectedTable == 'veganplant') {
            $stmt = $conn->prepare("INSERT INTO vegan_plant (name, image, description) VALUES (?, ?, ?)");
            $stmtDetails = $conn->prepare("INSERT INTO vegan_plant_details (name, image, image1, image2, appearance, flavour, texture, ingredient, category, tags) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmtNewTable = $conn->prepare("INSERT INTO vegan_plant_description (name, detail1, detail2, detail3) VALUES (?, ?, ?, ?)");
        } elseif ($selectedTable == 'fiberplant') {
            $stmt = $conn->prepare("INSERT INTO fiber_plant (name, image, description) VALUES (?, ?, ?)");
            $stmtDetails = $conn->prepare("INSERT INTO fiber_plant_details (name, image, image1, image2, appearance, flavour, texture, ingredient, category, tags) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmtNewTable = $conn->prepare("INSERT INTO fiber_plant_description (name, detail1, detail2, detail3) VALUES (?, ?, ?, ?)");
        } elseif ($selectedTable == 'veganegg') {
            $stmt = $conn->prepare("INSERT INTO vegan_egg (name, image, description) VALUES (?, ?, ?)");
            $stmtDetails = $conn->prepare("INSERT INTO vegan_egg_details (name, image, image1, image2, appearance, flavour, texture, ingredient, category, tags) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmtNewTable = $conn->prepare("INSERT INTO vegan_egg_description (name, detail1, detail2, detail3) VALUES (?, ?, ?, ?)");
        } elseif ($selectedTable == 'veganaccompaniments') {
            $stmt = $conn->prepare("INSERT INTO vegan_accompaniments (name, image, description) VALUES (?, ?, ?)");
            $stmtDetails = $conn->prepare("INSERT INTO vegan_accompaniments_details (name, image, image1, image2, appearance, flavour, texture, ingredient, category, tags) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmtNewTable = $conn->prepare("INSERT INTO vegan_accompaniments_description (name, detail1, detail2, detail3) VALUES (?, ?, ?, ?)");
        } elseif ($selectedTable == 'plantbeverage') {
            $stmt = $conn->prepare("INSERT INTO plant_based_beverages (name, image, description) VALUES (?, ?, ?)");
            $stmtDetails = $conn->prepare("INSERT INTO plant_based_beverages_details (name, image, image1, image2, appearance, flavour, texture, ingredient, category, tags) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmtNewTable = $conn->prepare("INSERT INTO plant_based_beverages_description (name, detail1, detail2, detail3) VALUES (?, ?, ?, ?)");
        } else {
            throw new Exception("Invalid table selected.");
        }

        $stmt->bind_param("sss", $name, $image, $description);
        if (!$stmt->execute()) {
            throw new Exception("Error inserting data: " . $stmt->error);
        }

        $stmtDetails->bind_param("ssssssssss", $name, $image, $image1, $image2, $appearance, $flavour, $texture, $ingredient, $category, $tags);
        if (!$stmtDetails->execute()) {
            throw new Exception("Error inserting data into details table: " . $stmtDetails->error);
        }

        $stmtNewTable->bind_param("ssss", $name, $detail1, $detail2, $detail3);
        if (!$stmtNewTable->execute()) {
            throw new Exception("Error inserting data into description table: " . $stmtNewTable->error);
        }

        $conn->commit();
        echo "<div class='alert alert-success'>The files have been uploaded, and product information has been saved.</div>";
        echo "<script>alert('Update Successful');window.location.href = 'newfile.php';</script>";

    } catch (Exception $e) {
        $conn->rollback();
        echo "<div class='alert alert-danger'>Transaction failed: " . $e->getMessage() . "</div>";
    }

    $stmt->close();
    $stmtDetails->close();
    $stmtNewTable->close();
    $conn->close();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="image/logo/logo-icon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #495057;
        }
        .navbar {
            background-color: #6F8CB1; /* Custom background color */
        }

        .logo {
            width: 200px;
        }

        .nav-link {
            color: #fff !important;
            font-size: 1.1rem;
            font-weight: 500;
            transition: color 0.3s ease-in-out;
        }

        .nav-link:hover {
            color: #DEE5D4 !important; /* Change color on hover */
        }

        .nav-link.active {
            color: #FEF9D9 !important;
            font-weight: bold; /* Make active link more visible */
        }

        .navbar-toggler {
            border: none;
        }

        /* Custom container width */
        .container-fluid {
            max-width: 1200px;
        }

        /* Ensure consistency across the navbar */
        @media (max-width: 992px) {
            .navbar-nav {
                text-align: center;
            }
            .nav-item {
                margin-bottom: 10px;
            }
        }
        .container {
            margin-top: 50px;
        }
        h1 {
            margin-bottom: 30px;
            font-size: 2rem;
            color: #343a40;
        }
        .form-control {
            border-radius: 0.375rem;
            box-shadow: none;
        }
        .alert {
            margin-top: 20px;
        }
        textarea.form-control {
            resize: vertical;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <!-- Logo -->
            <!--<a class="navbar-brand text-white" href="#">Logo</a>-->
            <a href="Dashbord.php" class=" d-flex align-items-center me-auto me-xl-0 my-2">
                <img src="image/logo/logo -1.png"  class="logo">
            </a>

            <!-- Toggler for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="Dashbord.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="Manage_order.php">Order Section</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="manageAdmin.php">Manage Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="newfile.php">Manage Food</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mb-5 shadow p-4 rounded">
        <h1 class="fw-bold mb-4">Enter Product Details</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="selected_table" class="form-label">Select Product Category:</label>
                <select name="selected_table" id="selected_table" class="form-select" required>
                    <option value="veganplant">Vegan plant-Based Ready Meals</option>
                    <option value="fiberplant">High-Fiber Plant-Based Vegan Meat Alternative</option>
                    <option value="veganegg">Vegan Egg Substitutes</option>
                    <option value="veganaccompaniments">Vegan Accompaniments</option>
                    <option value="plantbeverage">Plant-Based Beverages And Milk Supplements</option>
                </select>
            </div>

            <h3>Product Information,</h3>

            <div class="row">
                <div class="mb-3 col-12 col-sm-6">
                    <label for="name" class="form-label">Product Name:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="mb-3 col-12 col-sm-6">
                    <label for="appearance" class="form-label">Appearance:</label>
                    <input type="text" name="appearance" id="appearance" class="form-control" required>
                </div>

                <div class="mb-3 col-12 col-sm-6">
                    <label for="flavour" class="form-label">Flavour:</label>
                    <input type="text" name="flavour" id="flavour" class="form-control" required>
                </div>

                <div class="mb-3 col-12 col-sm-6">
                    <label for="texture" class="form-label">Texture:</label>
                    <input type="text" name="texture" id="texture" class="form-control" required>
                </div>

                <div class="mb-3 col-12 col-sm-6">
                    <label for="ingredient" class="form-label">Ingredient:</label>
                    <input type="text" name="ingredient" id="ingredient" class="form-control" required>
                </div>

                <div class="mb-3 col-12 col-sm-6">
                    <label for="category" class="form-label">Category:</label>
                    <select name="category" id="category" class="form-select" required>
                    <option value="Vegan plant-Based Ready Meals">Vegan plant-Based Ready Meals</option>
                    <option value="High-Fiber Plant-Based Vegan Meat Alternative">High-Fiber Plant-Based Vegan Meat Alternative</option>
                    <option value="Vegan Egg Substitutes">Vegan Egg Substitutes</option>
                    <option value="Vegan Accompaniments">Vegan Accompaniments</option>
                    <option value="Plant-Based Beverages And Milk Supplements">Plant-Based Beverages And Milk Supplements</option>
                    </select>
                </div>

                <div class="mb-3 col-12">
                    <label for="tags" class="form-label">Tags:</label>
                    <input type="text" name="tags" id="tags" class="form-control">
                </div>

            </div>

            <h3>Description Details,</h3>

            <div class="row">
                <div class="mb-3">
                    <label for="detail1" class="form-label">Product Description:</label>
                    <input type="text" name="detail1" id="detail1" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="detail1" class="form-label"> Description:</label>
                    <input type="text" name="description" id="description" class="form-control" required>
                </div>

                <div class="mb- col-12 col-sm-6">
                    <label for="detail2" class="form-label">Shelf life:</label>
                    <input type="text" name="detail2" id="detail2" class="form-control">
                </div>

                <div class="mb-3 col-12 col-sm-6">
                    <label for="detail3" class="form-label">Packing:</label>
                    <input type="text" name="detail3" id="detail3" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload Product Image:</label>
                    <input type="file" name="image" id="image" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="image1" class="form-label">Upload Image1:</label>
                    <input type="file" name="image1" id="image1" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="image2" class="form-label">Upload Image2:</label>
                    <input type="file" name="image2" id="image2" class="form-control">
                </div>
                
                <div class="mb-3">
                    <label for="image3" class="form-label">Upload Image3:</label>
                    <input type="file" name="image3" id="image3" class="form-control">
                </div>
                
                <div class="mb-3">
                    <label for="image4" class="form-label">Upload Image4:</label>
                    <input type="file" name="image4" id="image4" class="form-control">
                </div>

                <div class="mb-3 mt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="delete_food.php" class="btn btn-danger mx-3">Delete Product</a>
                </div>
            </div>
            
        </form>
        
    </div>

    <?php include('Menu/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlG0uFO2zXr2NXFoLgrjIKaLDFJ6XT1t3QcKt69R3NXFf6bM038C47iL6X" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhG81r6tZqWgnQJR5f7KKg2vvoC2EohFVvYQxjwXoPs+VxKf5fkWue5Hj9HG" crossorigin="anonymous"></script></body>
</html>
