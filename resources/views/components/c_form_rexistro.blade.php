<div class="form-wrapper">
<form method="POST">
    @csrf
    <div class="form-group">
        <p>Nome: <input type="text" name="nome" class="form-control" id="nome"  value="{{ old('nome') }}" placeholder="Introduza nome" required></p>
    </div>
    <div class="form-group">
        <p>Email: <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Introduza email" required></p>
    </div>
    <div class="form-group">
        <p>Password: <input type="password" name="password" class="form-control" id="password" placeholder="Password" required></p>
    </div>
    <div class="form-group">
        <p>Confirma password: <input type="password" name="confirmacont" class="form-control" id="confirmacont" placeholder="Confirme password" required></p>
    </div>
    <div class="form-group">
        <p>Dirección: <input type="text" name="direccion" class="form-control" id="direccion"  value="{{ old('direccion') }}" placeholder="Introduza dirección" required></p>
    </div>
    <input id="idasociado" type="hidden" name="idasociado" value="A">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
