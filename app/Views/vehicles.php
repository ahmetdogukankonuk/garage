<!DOCTYPE html>
<html>
<head>
    <title>Tüm Araçlar</title>
</head>
<body>
    <h1>Tüm Araçlar</h1>
    
    <table>
        <thead>
            <tr>
                <th>Brand</th>
                <th>Model</th>
                <th>Fuel Type</th>
                <th>Plate No</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehicles as $vehicle) : ?>
            <tr>
                <td><?= $vehicle['brandID']; ?></td>
                <td><?= $vehicle['modelName']; ?></td>
                <td><?= $vehicle['fuelType']; ?></td>
                <td><?= $vehicle['plateNo']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>