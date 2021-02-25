<?php include "./views/header.php"; ?>
    <body>
        <?php include "./views/navigation.php"; ?>
        
        <h1>User list</h1>
        <table>
            <th>Name</th>
            <th>Cash Balance</th>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user['name']; ?> </td>
                    <td><?php echo $user['balance']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
<?php include './views/footer.php'; ?>