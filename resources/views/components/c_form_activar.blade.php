<div class="form-wrapper">
  <form method="POST">
    @csrf
    <select class="js-example-basic-single" name="id">
      @if (count($usuarios) > 0)
        @foreach ($usuarios as $usuario)
          @if ($usuario->dependencia === 1)
            <option value="{{ $usuario->id }}">{{ $usuario->nome }} Activo: {{ $usuario->activado }}</option>
          @endif
        @endforeach
      @endif
    </select>
    <br><br>
    <button type="submit" class="btn btn-primary">Activar/desactivar</button>
  </form>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>