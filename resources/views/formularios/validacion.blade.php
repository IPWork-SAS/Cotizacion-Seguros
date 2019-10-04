<div>
    <form action="/cotizacionvalidar" method="POST">
        @csrf
        <label for="codigo"></label>
        <input type="text" name="codigo">
        <input type="submit" value="Verificar">

    </form>
</div>