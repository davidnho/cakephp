<h2>Topics</h2>

<?php echo $this->HTML->link('Create a new topic', array('controller' => 'topics', 'action' => 'create')); ?>
<br>

<?php
if (AuthComponent::user()) {
    echo $this->HTML->link('Logout', array('controller' => 'users', 'action' => 'logout'));
} else {
    echo $this->HTML->link('Login', array('controller' => 'users', 'action' => 'login'));
}
?>

<?php ?>

<table>
    <tr>

        <th>Title</th>
        <th>Created</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php foreach ($topics as $topic): ?>
        <tr>

            <?php if (AuthComponent::user() == 2) : ?>
                <td><?php echo $this->HTML->link($topic['Topic']['title'], array('controller' => 'topics', 'action' => 'viewdata', $topic['Topic']['id'])); ?> </td>
                <td><?php echo $topic['Topic']['created']; ?> </td>
                <td><?php echo $this->HTML->link('Edit', array('controller' => 'topics', 'action' => 'editdata', $topic['Topic']['id'])); ?> </td>
                <td><?php echo $this->Form->postLink('Delete', array('controller' => 'topics', 'action' => 'deletedata', $topic['Topic']['id']), array('confirm' => 'Are you sure you want to delete this topic?')); ?> </td>
            </tr>
        <?php endif; ?>

        <?php if (AuthComponent::user() == 1 || !AuthComponent::user()): ?>
            <?php if ($topic['Topic']['visible'] == 1) : ?>
                <td><?php echo $this->HTML->link($topic['Topic']['title'], array('controller' => 'topics', 'action' => 'viewdata', $topic['Topic']['id'])); ?> </td>
                <td><?php echo $topic['Topic']['created']; ?> </td>
                <td><?php echo $this->HTML->link('Edit', array('controller' => 'topics', 'action' => 'editdata', $topic['Topic']['id'])); ?> </td>
                <td><?php echo $this->Form->postLink('Delete', array('controller' => 'topics', 'action' => 'deletedata', $topic['Topic']['id']), array('confirm' => 'Are you sure you want to delete this topic?')); ?> </td>
            </tr>
        <?php endif; ?>            
    <?php endif; ?>            

<?php endforeach; ?>   
<?php unset($topic); ?>    
</table>
