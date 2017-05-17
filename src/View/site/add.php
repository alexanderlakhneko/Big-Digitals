<h3>Add User</h3><br/>

<form method="post" action="/api/users">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="" class="form-control" />
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="" class="form-control" />
    </div>
    <div class="form-group">
        <label for="password">Pass</label>
        <input type="text" id="password" name="password" value="" class="form-control" />
    </div>
    <input type="submit" value="Save" class="btn btn-success" />
</form>
