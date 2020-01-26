<div class="form-wrapper">
<form method="POST">
    @csrf
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" name="nome" id="nome" placeholder="Introduza o nome" value="{{ old('nome') }}" required>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="{{ old('email') }}" required>
    <small id="emailHelp" class="form-text text-muted">Introduza a dirección de correo electrónico.</small>
  </div>
  <div class="form-group">
    <label for="password">Contrasinal</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Contrasinal" required>
  </div>
  <div class="form-group">
    <label for="nome">Dirección</label>
    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Introduza a dirección" value="{{ old('direccion') }}" required>
  </div>
  <div class="form-group">
    <label for="nome">Teléfono</label>
    <input type="tel" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}" required>
  </div>
  <input id="dependencia" type="hidden" name="dependencia" value="{{ $dependencia }}">
  <input id="activado" type="hidden" name="activado" value="1">
  <button type="submit" class="btn btn-primary">Crear</button>
</form>    
</div>
