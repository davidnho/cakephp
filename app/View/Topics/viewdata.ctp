<h1><?php echo $topic['Topic']['title']; ?></h1>

<?php echo $this->HTML->link('Create a post in this topic', array('controller' => 'posts', 'action' => 'addpost', $topic['Topic']['id'])); ?>
<br>
<table>
    <tr>
        <th>Sr.No</th><th>User</th><th>Posts</th>
    <?php
    $counter = 1;
    foreach ($topic['Post'] as $post) {
        echo "<tr><td>".$counter . "</td><td>".$post['user_id']."</td><td>" . $post['body'] . "</td></tr>";
        $counter++;
    }
    ?>
    </tr>
    
</table>

