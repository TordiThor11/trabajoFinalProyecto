<!-- application/views/items_view.php -->
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .item {
            padding: 10px;
            margin: 5px 0;
            background: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container mt-3">
        <div class="item d-flex justify-content-between align-items-center">
            <div>Item 1</div>
            <div>
                <button class="btn btn-primary">Editar</button>
                <button class="btn btn-danger">Eliminar</button>
            </div>
        </div>

        <div class="item d-flex justify-content-between align-items-center">
            <div>Item 2</div>
            <div>
                <button class="btn btn-primary">Editar</button>
                <button class="btn btn-danger">Eliminar</button>
            </div>
        </div>

        <div class="item d-flex justify-content-between align-items-center">
            <div>Item 3</div>
            <div>
                <button class="btn btn-primary">Editar</button>
                <button class="btn btn-danger">Eliminar</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>