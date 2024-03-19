<div class="container-cliente">
    <h2>Registro datos del Cliente</h2>

    <form action="javascript:registrarCliente()" method="post" id="form-cliente">
        <div>
            <label for="nombre">C.I.:</label>
            <input type="text" name="CI">
        </div>

        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre">
        </div>

        <div>
            <label for="numero_compra">Número de compras:</label>
            <input type="number" name="numero_compra">
        </div>

        <button type="submit">Registrar cliente</button>
    </form>
</div>