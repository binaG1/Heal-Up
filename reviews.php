<?php
session_start();
include_once 'Database.php';
include_once 'Re.php';


     $message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       $db = new Database();
    $conn = $db->getConnection();
    $review = new Re($conn);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $experience = $_POST['experience'];
    $recommendation = $_POST['recommendation'];
   
   

     
    if ($review->addReview($name, $email, $experience, $recommendation)) {
        $message = "Review saved successfully!";
    } else {
        $message = "Error saving review.";
    }


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="review-page">
    <div class="re"><a href="login1.php">↩</a>
    </div>
    <div class="review-box">
        <h1><strong>Review Our Service</strong></h1>
        <h3><em>We appreciate your feedback!</em></h3>

        <form class="box" action="reviews.php" method="POST">
            <label for=""><strong>Your Name</strong></label><br>
            <input type="text" name="name" placeholder="Your Name" required><br><br>

            <label for=""><strong>Email Address</strong></label><br>
                <input type="email" name="email" placeholder="Your email" required><br> <br>
           
            <label><strong>Overall Rating</strong></label>
            <select style="padding: 10px; width: 416px;" name="experience" required> 
            <option  value="1">★☆☆☆☆</option> 
                <option value="2">★★☆☆☆</option> 
                <option value="3">★★★☆☆</option> 
                <option value="4">★★★★☆</option>
                <option value="5">★★★★★</option> 
            </select><br><br>

        <label><strong>Satisfaction Level</strong></label>
        <div class="mood">
            <label for="">😄 🙂 😐 ☹️ 😠 </label>
        </div><br>

        <label><strong>Feedback</strong></label><br>
       <textarea name="recommendation" placeholder="Please share your experience with us" required></textarea> <br><br>

        <label for=""> <strong><i>Would you recommend us to a friend?</i></strong></label>
        <div class="radio">
            <label class="r1"><input type="radio" name="option" required> Yes</label>
            <label class="r2"><input type="radio" name="option"> No</label>
            <label class="r3"><input type="radio" name="option"> Other</label>
        </div> <br>
        <?php if (!empty($message)) echo "<p>$message</p>"; ?>

        <button>Submit Review</button>
        </label>
         </form>
    </div>


</body>

</html>