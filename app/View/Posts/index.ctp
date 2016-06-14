<h2>Posts</h2>
<pre>
    
</pre>
<table>
    <tr>
        <th>ID</th>
        <th>Topic Id</th>

    </tr>
    <?php foreach ($posts as $post) { ?>
        <tr>

            <td><?php echo $this->HTML->link($post['Post']['id'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?></td>
            
            <td><?php echo $this->HTML->link($post['Topic']['title'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?></td>

        </tr>
        <?php
    }
    unset($post);
    ?>
</table>


