<?php
session_start();

$errors = isset($_SESSION["errors"]) ? $_SESSION["errors"] : [];
$form_data = isset($_SESSION["form_data"]) ? $_SESSION["form_data"] : [];
unset($_SESSION["errors"], $_SESSION["form_data"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation page</title>
    <style>
        body {
           font-family: Arial, sans-serif;
           background-color: #f5f5f5;
           margin: 0;
           padding: 0;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
    }

      form {
          background: white;
          padding: 20px;
          border-radius: 8px;
          box-shadow: 0 0 10px rgba(0,0,0,0.1);
          width: 300px;
  }

     div {
         margin-bottom: 15px;
}

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
}

    input[type="date"],
    input[type="time"],
    input[type="number"] {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 4px;
}

button {
    width: 100%;
    padding: 10px;
    border: none;
    background-color: #007BFF;
    color: white;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #0056b3;
}

.error-message {
    color: red;
    font-size: 14px;
}

    </style>
</head>

<body>
    <form action="process-reservation-back.php" method="post">
        <div>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="<?php echo isset($form_data['date']) ? htmlspecialchars($form_data['date']) : ''; ?>" required>
            <?php if (isset($errors["date_error"])): ?>
                <span class="error-message">
                    <?php echo $errors["date_error"]; ?>
                </span>
            <?php endif; ?>
        </div>
        <div>
            <label for="time">Time:</label>
            <input type="time" id="time" name="time" value="<?php echo isset($form_data['time']) ? htmlspecialchars($form_data['time']) : ''; ?>" required>
            <?php if (isset($errors["time_error"])): ?>
                <span class="error-message">
                    <?php echo $errors["time_error"]; ?>
                </span>
            <?php endif; ?>
        </div>
        <div>
            <label for="party_size">Party size:</label>
            <input type="number" id="party_size" name="party_size" placeholder="number of parties" value="<?php echo isset($form_data['party_size']) ? htmlspecialchars($form_data['party_size']) : ''; ?>" required>
            <?php if (isset($errors["party_size_error"])): ?>
                <span class="error-message">
                    <?php echo $errors["party_size_error"]; ?>
                </span>
            <?php endif; ?>
        </div>

        <button type="submit">Check Availability</button>
    </form>
    <?php if (isset($_SESSION['success_message'])): ?>
        <p>
            <?php
            echo $_SESSION['success_message'];
            unset($_SESSION['success_message']);
            ?>
        </p>
    <?php endif; ?>
</body>

</html>
