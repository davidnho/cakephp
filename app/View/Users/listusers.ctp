
<table>
    <th>Id</th>
    <th>Username</th>
    <th>Password</th>
    <?php foreach ($users as $user): ?>
    
    <tr>
        <td><?php echo $user['User']['id'] .'<br>'; ?></td>
        <td><?php echo $user['User']['username'] .'<br>'; ?></td>
        <td><?php echo $user['User']['password'] .'<br>'; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php unset($user); ?>

