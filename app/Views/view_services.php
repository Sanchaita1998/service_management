<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Services</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        td button {
            padding: 6px 12px;
            margin-right: 5px;
            border: none;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            font-size: 14px;
        }

        td button:hover {
            background-color: #45a049;
        }

        td form {
            display: inline;
        }

        td form button {
            background-color: #f44336;
        }

        td form button:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>
    <h2>All Services</h2>
    <table>
        <thead>
            <tr>
                <th>Service Name</th>
                <th>Type</th>
                <th>Duration</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Notes</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $service): ?>
                <tr>
                    <td><?php echo $service->name; ?></td>
                    <td><?php echo $service->type; ?></td>
                    <td><?php echo $service->duration; ?> months</td>
                    <td><?php echo $service->start_date; ?></td>
                    <td><?php echo $service->end_date; ?></td>
                    <td><?php echo $service->notes; ?></td>
                    <td><?php echo $service->status; ?></td>
                    <td>
                        <form action="/renew-service/<?php echo $service->id; ?>" method="POST">
                            <button type="submit">Renew</button>
                        </form>
                        <form action="/delete-service/<?php echo $service->id; ?>" method="POST">
                            <button type="submit" onclick="return confirm('Are you sure?');">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
