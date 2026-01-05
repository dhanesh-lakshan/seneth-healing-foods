<?php
include('connection.php'); 

if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['category'])) {
    $id = $_GET['id'];
    $category = $_GET['category']; 

    $successMessage = '';
    $errorMessage = '';

    switch ($category) {
        case 'fiber_plant':
            $sql1 = "DELETE FROM fiber_plant WHERE id=$id";
            $res1 = mysqli_query($conn, $sql1);

            if ($res1) {
                
                $sql2 = "DELETE FROM fiber_plant_details WHERE id=$id";
                $res2 = mysqli_query($conn, $sql2);

                // Delete from 'newtable'
                $sql3 = "DELETE FROM fiber_plant_description WHERE id=$id";
                $res3 = mysqli_query($conn, $sql3);

                if ($res2 && $res3) {
                    $successMessage = "<div class='success'>Item Deleted Successfully .</div>";
                } else {
                    $errorMessage = "<div class='error'>Failed to Delete Item. Try Again Later.</div>";
                }
            } else {
                $errorMessage = "<div class='error'>Failed to Delete Item. Try Again Later.</div>";
            }
            break;

        case 'plant_based_beverages':
            
            $sql1 = "DELETE FROM plant_based_beverages WHERE id=$id";
            $res1 = mysqli_query($conn, $sql1);

            if ($res1) {
                
                $sql2 = "DELETE FROM plant_based_beverages_details WHERE id=$id";
                $res2 = mysqli_query($conn, $sql2);

              
                $sql3 = "DELETE FROM plant_based_beverages_description WHERE id=$id";
                $res3 = mysqli_query($conn, $sql3);

                if ($res2 && $res3) {
                    $successMessage = "<div class='success'>Item Deleted Successfully.</div>";
                } else {
                    $errorMessage = "<div class='error'>Failed to Delete Item. Try Again Later.</div>";
                }
            } else {
                $errorMessage = "<div class='error'>Failed to Delete Item Try Again Later.</div>";
            }
            break;

        case 'vegan_egg':
            
            $sql1 = "DELETE FROM vegan_egg WHERE id=$id";
            $res1 = mysqli_query($conn, $sql1);

            if ($res1) {
            
                $sql2 = "DELETE FROM vegan_egg_details WHERE id=$id";
                $res2 = mysqli_query($conn, $sql2);

                
                $sql3 = "DELETE FROM vegan_egg_description WHERE id=$id";
                $res3 = mysqli_query($conn, $sql3);

                if ($res2 && $res3) {
                    $successMessage = "<div class='success'>Item Deleted Successfully .</div>";
                } else {
                    $errorMessage = "<div class='error'>Failed to Delete Item. Try Again Later.</div>";
                }
            } else {
                $errorMessage = "<div class='error'>Failed to Delete Item. Try Again Later.</div>";
            }
            break;

        case 'vegan_plant':
            
                $sql1 = "DELETE FROM vegan_plant WHERE id=$id";
                $res1 = mysqli_query($conn, $sql1);
    
                if ($res1) {
                   
                    $sql2 = "DELETE FROM vegan_plant_details WHERE id=$id";
                    $res2 = mysqli_query($conn, $sql2);
    
                    
                    $sql3 = "DELETE FROM vegan_plant_description WHERE id=$id";
                    $res3 = mysqli_query($conn, $sql3);
    
                    if ($res2 && $res3) {
                        $successMessage = "<div class='success'>Item Deleted Successfully .</div>";
                    } else {
                        $errorMessage = "<div class='error'>Failed to Delete Item. Try Again Later.</div>";
                    }
                } else {
                    $errorMessage = "<div class='error'>Failed to Delete Item. Try Again Later.</div>";
                }
                break;
                case 'vegan_accompaniments':
            
                    $sql1 = "DELETE FROM vegan_accompaniments WHERE id=$id";
                    $res1 = mysqli_query($conn, $sql1);
        
                    if ($res1) {
                        
                        $sql2 = "DELETE FROM vegan_accompaniments_details WHERE id=$id";
                        $res2 = mysqli_query($conn, $sql2);
        
                       
                        $sql3 = "DELETE FROM vegan_accompaniments_description WHERE id=$id";
                        $res3 = mysqli_query($conn, $sql3);
        
                        if ($res2 && $res3) {
                            $successMessage = "<div class='success'>Item Deleted Successfully.</div>";
                        } else {
                            $errorMessage = "<div class='error'>Failed to Delete Item. Try Again Later.</div>";
                        }
                    } else {
                        $errorMessage = "<div class='error'>Failed to Delete Item. Try Again Later.</div>";
                    }
                    break;
        default:
            $errorMessage = "<div class='error'>Invalid Category Provided.</div>";
            break;
    }

    if ($successMessage) {
        $_SESSION['delete'] = $successMessage;
    } else {
        $_SESSION['delete'] = $errorMessage;
    }

    header('Location: delete_food.php'); 
    exit();
} else {
    $_SESSION['delete'] = "<div class='error'>Invalid ID or category provided.</div>";
    header('Location: delete_food.php');
    exit();
}
?>
