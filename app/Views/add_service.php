<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Service</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        h2 {
            color: #4CAF50;
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="text"], input[type="email"], textarea {
            height: 40px;
        }

        select {
            height: 40px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        #customType {
            margin-top: 10px;
        }

        textarea {
            resize: vertical;
        }
    </style>
</head>
<body>
    <h2>Add New Service</h2>
    <form method="POST" action="/add-service">
        <label for="type">Service Type:</label>
        <select id="type" name="type" required>
            <option value="Domain">Domain</option>
            <option value="Server">Server</option>
            <option value="Other">Other</option>
        </select>
        <br>
        <div id="customType" style="display: none;">
            <label for="custom_type">Custom Type:</label>
            <input type="text" id="custom_type" name="custom_type">
        </div>
        <br>
        <label for="name">Service Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="duration">Duration:</label>
        <select id="duration" name="duration" required>
            <option value="1">1 Month</option>
            <option value="3">3 Months</option>
            <option value="6">6 Months</option>
            <option value="12">1 Year</option>
        </select>
        <br>
        <label for="notes">Notes:</label>
        <textarea id="notes" name="notes"></textarea>
        <br>
        <button type="submit">Add Service</button>
    </form>
    <script>
        document.getElementById('type').addEventListener('change', function() {
            const customType = document.getElementById('customType');
            customType.style.display = this.value === 'Other' ? 'block' : 'none';
        });
    </script>
</body>
</html>
