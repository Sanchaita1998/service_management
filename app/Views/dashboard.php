<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        h3 {
            text-align: center;
            color: #555;
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        button {
            padding: 6px 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        form {
            display: inline;
        }
    </style>
</head>
<body>
    <h2>Dashboard</h2>
    <h3>Expiring and Expired Services</h3>
    <table>
        <thead>
            <tr>
                <th>Service Name</th>
                <th>Type</th>
                <th>Expiration Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $service): ?>
                <tr>
                    <td><?php echo $service->name; ?></td>
                    <td><?php echo $service->type; ?></td>
                    <td><?php echo $service->end_date; ?></td>
                    <td><?php echo $service->status; ?></td>
                    <td>
                        <form action="/mark-read/<?php echo $service->id; ?>" method="POST">
                            <button type="submit">Mark as Read</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
