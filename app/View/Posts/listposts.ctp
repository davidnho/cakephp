<h2>Posts</h2>
<pre>
    <?php print_r($posts); ?>
</pre>
<table>
    <tr>
        <th>Id</th>
        <th>Topic Id</th>
    </tr>
    <?php foreach ($posts as $post) : ?>
        <tr>
            <td><?php echo $this->HTML->link($post['Post']['id'], array('controller' => 'posts', 'action' => 'viewdata', $post['Post']['id'])); ?></td>
<td><?php echo $this->HTML->link($post['Topic']['title'], array('controller' => 'posts', 'action' => 'viewdata', $post['Post']['id'])); ?></td>
        </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>



