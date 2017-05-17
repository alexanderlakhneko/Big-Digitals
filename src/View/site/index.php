<form method="post" action="/search/">
    <div>
        <label for="name">Name:</label>
        <input type="text" id="title" name="name" value=""/>
        <input type="submit" class="btn btn-success" value="Search" />
    </div>
</form>
<div>
    <a href="/add/"><button class="btn btn-success">New User</button></a>
</div>
<table class="table table-striped" style="width: 400px;">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Pass</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach($data as $users): ?>
        <tr>
            <td><?php echo $users['id']; ?></td>
            <td><?php echo $users['name']; ?></td>
            <td><?php echo $users['email']; ?></td>
            <td><?php echo $users['password']; ?></td>
            <td><a href="/edit/<?=$users['id']?>"><button class="btn btn-warning">Edit</button></a></td>
<!--            <td><a href="/del/--><?//=$users['id']?><!--"><button class="btn btn-danger">Delete</button></a></td>-->
        </tr>
    <?php endforeach; ?>
</table>