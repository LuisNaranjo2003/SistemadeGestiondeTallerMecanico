<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Factura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 20px;
        }
        .form-container {
            background-color: #ffffff;
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h2 {
            color: #2196F3;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .btn-submit {
            background-color: #2196F3;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        .btn-submit:hover {
            background-color: #0b7dda;
        }
        .btn-cancel {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #f44336;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>✏️ Editar Factura N° <?= isset($factura['id_factura']) ? $factura['id_factura'] : ''; ?></h2>
    
    <form action="index.php?url=facturas/actualizar" method="POST">
        
        <input type="hidden" name="id" value="<?= isset($factura['id_factura']) ? $factura['id_factura'] : ''; ?>">
        
        <div class="form-group">
            <label for="orden_id">ID de la Orden:</label>
            <input type="number" id="orden_id" name="orden_id" required value="<?= isset($factura['orden_id']) ? $factura['orden_id'] : ''; ?>">
        </div>

        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required value="<?= isset($factura['fecha']) ? $factura['fecha'] : ''; ?>">
        </div>

        <div class="form-group">
            <label for="subtotal">Subtotal:</label>
            <input type="number" id="subtotal" name="subtotal" step="0.01" min="0" required value="<?= isset($factura['subtotal']) ? $factura['subtotal'] : ''; ?>" oninput="calcularTotal()">
        </div>

        <div class="form-group">
            <label for="iva">IVA:</label>
            <input type="number" id="iva" name="iva" step="0.01" min="0" required value="<?= isset($factura['iva']) ? $factura['iva'] : ''; ?>" oninput="calcularTotal()">
        </div>

        <div class="form-group">
            <label for="total">Total:</label>
            <input type="number" id="total" name="total" step="0.01" min="0" required value="<?= isset($factura['total']) ? $factura['total'] : ''; ?>" readonly>
        </div>

        <button type="submit" class="btn-submit">🔄 Actualizar Factura</button>
        <a href="index.php?url=facturas/listar" class="btn-cancel">Cancelar</a>
    </form>
</div>

<script>
function calcularTotal() {
    const subtotal = parseFloat(document.getElementById('subtotal').value) || 0;
    const iva = parseFloat(document.getElementById('iva').value) || 0;
    const total = subtotal + iva;
    document.getElementById('total').value = total.toFixed(2);
}
</script>

</body>
</html>