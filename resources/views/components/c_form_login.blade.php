<div id="logindiv" class="collapse form-wrapper">
<form method="POST">
    @csrf
    <div class="form-group">
        <p>Email: <input type="email" name="email" class="form-control" id="email" placeholder="Introduza email" required></p>
    </div>
    <div class="form-group">
        <p>Password: <input type="password" name="password" class="form-control" id="password" placeholder="Password" required></p>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
