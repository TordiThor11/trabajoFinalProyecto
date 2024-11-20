<!-- Search Bar Section -->
<div class="search-container">
    <div class="container">
        <div class="search-input">
            <input type="text" class="form-control" placeholder="Buscar proyectos..." id="searchProjects">
        </div>
    </div>
</div>

<!-- Project Cards Section (tu código existente) -->
<div class="container mt-5">
    <div class="row">
        <?php foreach ($proyectos as $proyecto): ?>
            <div class="col-md-4 project-item">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="<?= $proyecto->nombre; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $proyecto->nombre; ?></h5>
                        <p class="card-text"><?= $proyecto->fecha_limite; ?></p>
                        <a href="<?= base_url() ?>detalleProyecto/<?= $proyecto->id_proyecto; ?>" 
                        class="btn btn-primary">Ver más</a>
                    </div> 
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>




    <script>
    // Esperamos a que el DOM esté completamente cargado antes de ejecutar cualquier código
    document.addEventListener('DOMContentLoaded', function() {
        // Obtenemos el elemento de entrada (el input) por su ID 'searchProjects'
        const searchInput = document.getElementById('searchProjects');
        
        // Agregamos un evento 'input' que se dispara cada vez que el usuario escribe o modifica el texto
        searchInput.addEventListener('input', function(e) {
            // Convertimos el texto ingresado a minúsculas para hacer una búsqueda sin distinguir mayúsculas/minúsculas
            const searchText = e.target.value.toLowerCase();
            
            // Seleccionamos todos los elementos que tienen la clase 'project-item'
            // Esto nos da un NodeList (similar a un array) con todas las tarjetas de proyectos
            const projects = document.querySelectorAll('.project-item');
            
            // Recorremos cada proyecto encontrado
            projects.forEach(project => {
                // Dentro de cada proyecto, buscamos el elemento que tiene la clase 'card-title'
                // y obtenemos su texto (el título del proyecto) en minúsculas
                const title = project.querySelector('.card-title').textContent.toLowerCase();
                
                // Comparamos si el título contiene el texto buscado
                if (title.includes(searchText)) {
                    // Si el título contiene el texto buscado, mostramos el proyecto
                    // (dejamos el display en su valor predeterminado)
                    project.style.display = '';
                } else {
                    // Si el título NO contiene el texto buscado, ocultamos el proyecto
                    project.style.display = 'none';
                }
            });
        });
    });
    </script>