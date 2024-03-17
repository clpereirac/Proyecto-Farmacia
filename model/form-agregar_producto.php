<div class="formulario-agragar-prductos">
    <h2>Formulario para agreagar productos</h2>

    <form action="javascript:registrarProductos()" method="post" id="form-registro" enctype="multipart/form-data">
        <div>
            <label for="fotografia">Fotografia:</label>
            <input type="file" name="fotografia">
        </div>
        <div>
            <label for="nombre">Nombre producto:</label>
            <input type="text" name="nombre">
        </div>
        <div>
            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion">
        </div>
        <div>
            <label for="precio">Precio:</label>
            <input type="number" name="precio">
        </div>
        <div>
            <label for="stock">Stock:</label>
            <input type="number" name="stock">
        </div>
        <div>
            <label for="fecha_de_vencimiento">Fecha de vencimiento:</label>
            <input type="date" name="fecha_de_vencimiento">
        </div>
        <div>
            <label for="lote">Lote:</label>
            <input type="text" name="lote">
        </div>
        <div class="botom">
            <button type="submit" class="btn_registrar">Registrar</button>
        </div>
    </form>
</div>