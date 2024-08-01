<!DOCTYPE html>
<html>

<head>
    <title>Diabetes Prediction</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
    body {
        background: url('https://thumbs.dreamstime.com/b/ozempic-semaglutide-pen-injection-diabetes-stimulates-body-to-produce-insulin-lowering-blood-glucose-levels-affects-315613880.jpg?w=768') no-repeat center center fixed;
        background-size: cover;
        font-family: Arial, sans-serif;
        color: #333;
    }

    .container {
        width: 80%;
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background: rgba(255, 255, 255, 0.2);
        /* Semi-transparent background */
        border-radius: 12px;
        /* Slightly more rounded corners */
        backdrop-filter: blur(10px);
        /* Frosted glass effect */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        /* Softer shadow */
        border: 1px solid rgba(255, 255, 255, 0.3);
        /* Light border for crystal effect */
    }

    h1 {
        text-align: center;
        color: #2635d7;
        /* Red color for heart-related theme */
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        /* Ensures full width */
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background: rgba(255, 255, 255, 0.9);
        /* Slightly less transparent background for input elements */
        box-sizing: border-box;
        /* Ensures padding is included in the width */
    }

    button {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #E53935;
        /* Red color for button */
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background-color: #d32f2f;
        /* Darker red on hover */
    }

    #output {
        text-align: center;
        margin-top: 20px;
    }
</style>

<body>
    <div class="container">
        <h1>Diabetes Prediction Form</h1>
        <form id="predictForm" action="" method="post">
            <div class="form-group">
                <label for="gender_value">Gender:</label>
                <select name="gender_value">
                    <option value="1">Male</option>
                    <option value="0">Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="age_value">Age:</label>
                <input type="number" id="age_value" name="age_value" required>
            </div>

            <div class="form-group">
                <label for="hypertension_value">Ever experinced Hypertension:</label>
                <select name="hypertension_value">
                    <option value="1">Yes</option>
                    <option value="0" selected>No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="heart_disease_value">Prior Heart Disease :</label>
                <select name="heart_disease_value">
                    <option value="1">Yes</option>
                    <option value="0" selected>No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="bmi_value">BMI Value:</label>
                <input type="number" id="bmi_value" name="bmi_value" required>
            </div>

            <div class="form-group">
                <label for="HbA1c_level_value">HbA1c Level Value:</label>
                <input type="number" id="HbA1c_level_value" name="HbA1c_level_value" required>
            </div>

            <div class="form-group">
                <label for="blood_glucose_level_value">Blood Glucose Level Value:</label>
                <input type="number" id="blood_glucose_level_value" name="blood_glucose_level_value" required>
            </div>

            <div class="form-group">
                <label for="smoking_history">Smoking History:</label>
                <select name="smoking_history">
                    <option value="No Info">No Information</option>
                    <option value="current">Current</option>
                    <option value="ever">Ever</option>
                    <option value="never">Never</option>
                    <option value="former">Former</option>
                    <option value="not current">Not Current</option>
                </select>
            </div>

            <button type="submit">Predict Diabetes</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $gender_value = $_POST['gender_value'];
            $age_value = $_POST['age_value'];
            $hypertension_value = $_POST['hypertension_value'];
            $heart_disease_value = $_POST['heart_disease_value'];
            $bmi_value = $_POST['bmi_value'];
            $HbA1c_level_value = $_POST['HbA1c_level_value'];
            $blood_glucose_level_value = $_POST['blood_glucose_level_value'];
            $smoking_history = $_POST['smoking_history'];

            $res = file_get_contents('http://localhost:5000/diabetes?gender_value=' . urlencode($gender_value) . '&age_value=' . urlencode($age_value).'&hypertension_value='.urlencode($hypertension_value).'&heart_disease_value='.urlencode($heart_disease_value).'&bmi_value='.urlencode($bmi_value).'&HbA1c_level_value='.urlencode($HbA1c_level_value).'&blood_glucose_level_value='.urlencode($blood_glucose_level_value).'&smoking_history='.urlencode($smoking_history)
        );
            echo $res;

        } ?>
    </div>
</body>

</html>