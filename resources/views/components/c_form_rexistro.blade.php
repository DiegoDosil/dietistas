<div class="form-wrapper">
<form method="POST">
    @csrf
<form>
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" placeholder="Introduza o nome" value="{{ old('nome') }}" required>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="{{ old('email') }}" required>
    <small id="emailHelp" class="form-text text-muted">Introduza a dirección de correo electrónico.</small>
  </div>
  <div class="form-group">
    <label for="password">Contrasinal</label>
    <input type="password" class="form-control" id="password" placeholder="Contrasinal" required>
  </div>
  <div class="form-group">
    <label for="nome">Dirección</label>
    <input type="text" class="form-control" id="direccion" placeholder="Introduza a dirección" value="{{ old('direccion') }}" required>
  </div>
  <div class="form-group">
    <label for="nome">Teléfono</label>
    <input type="number" class="form-control" id="telefono" value="{{ old('telefono') }}" required>
  </div>
  <input id="dependencia" type="hidden" name="dependencia" value="{{ $dependencia }}">
  <button type="submit" class="btn btn-primary">Crear</button>
</form>    
<!--    <div class="form-group">
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
    <button type="submit" class="btn btn-primary">Submit</button>-->
</form>
</div>
