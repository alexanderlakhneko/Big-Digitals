<h3>Edit User</h3><br/>

<form method="post" action="/api/users/<?=$data['id'];?>">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?=$data['name'];?>" class="form-control" />
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?=$data['email'];?>" class="form-control" />
    </div>
    <div class="form-group">
        <label for="password">Pass</label>
        <input type="text" id="password" name="password" value="<?=$data['password'];?>" class="form-control" />
    </div>
    <input type="submit" value="Save" class="btn btn-success" />
</form>
