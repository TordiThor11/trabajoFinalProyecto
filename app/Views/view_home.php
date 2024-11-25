<!-- Hero Section -->
<div class="bg-light py-5 mb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <h1 class="display-4 fw-bold mb-4">Descubre Proyectos Innovadores</h1>
                <p class="lead text-muted mb-4">Encuentra y apoya proyectos únicos que están cambiando el mundo</p>
            </div>
            <div class="col-md-6">
                <div class="bg-white p-3 rounded shadow-sm">
                    <div class="input-group">
                        <span class="input-group-text bg-white">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input type="text"
                            class="form-control border-start-0"
                            placeholder="Buscar proyectos..."
                            id="searchProjects"
                            aria-label="Buscar proyectos">
                        <input type="text" class="form-control border-start-0" placeholder="Buscar proyectos..."
                            id="searchProjects" aria-label="Buscar proyectos">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Project Cards Section -->
<div class="container">
    <div class="row" id="projectsContainer">
        <?php if (empty($proyectos)): ?>
            <div class="col-12 text-center py-5">
                <div class="alert alert-info d-inline-block">
                    <i class="fas fa-info-circle me-2"></i>
                    No se encontraron proyectos disponibles en este momento.
                </div>
            </div>
        <?php else: ?>
            <?php foreach ($proyectos as $proyecto): ?>
                <div class="col-md-4 mb-4 project-item">
                    <div class="card h-100 shadow-sm">
                        <div class="position-relative">
                            <img src="<?= base_url('uploads/proyectos/' . $proyecto->imagen_principal) ?>" class="card-img-top object-fit-cover" alt="Imagen del Proyecto" style="height: 200px;" alt="<?= htmlspecialchars($proyecto->nombre); ?>">
                            <div class="position-absolute top-0 end-0 p-2">
                                <span class="badge bg-primary">
                                    <?= date('d M Y', strtotime($proyecto->fecha_limite)); ?>
                                </span>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-3"><?= htmlspecialchars($proyecto->nombre); ?></h5>
                            <div class="mt-auto">
                                <a href="<?= base_url() ?>detalleProyecto/<?= $proyecto->id_proyecto; ?>"
                                    class="btn btn-outline-primary w-100">
                                    <i class="fas fa-arrow-right me-2"></i>Ver más
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $session = session();
                $tipoUsuario = $session->get('tipo_usuario');

                if (($tipoUsuario == 1) or ($tipoUsuario == 0 and $proyecto->activo == 1)): ?>

                    <div class="col-md-4 mb-4 project-item">
                        <div class="card h-100 shadow-sm">
                            <div class="position-relative">
                                <img src="https://via.placeholder.com/350x200" class="card-img-top object-fit-cover"
                                    style="height: 200px;" alt="<?= htmlspecialchars($proyecto->nombre); ?>">
                                <div class="position-absolute top-0 end-0 p-2">
                                    <span class="badge bg-primary">
                                        <?= date('d M Y', strtotime($proyecto->fecha_limite)); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title mb-3"><?= htmlspecialchars($proyecto->nombre); ?></h5>
                                <div class="mt-auto">
                                    <a href="<?= base_url() ?>detalleProyecto/<?= $proyecto->id_proyecto; ?>"
                                        class="btn btn-outline-primary w-100">
                                        <i class="fas fa-arrow-right me-2"></i>Ver más
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif ?>


            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchProjects');
        const projectsContainer = document.getElementById('projectsContainer');

        searchInput.addEventListener('input', function(e) {
            const searchText = e.target.value.toLowerCase();
            const projects = document.querySelectorAll('.project-item');
            let foundProjects = false;

            projects.forEach(project => {
                const title = project.querySelector('.card-title').textContent.toLowerCase();
                if (title.includes(searchText)) {
                    project.classList.remove('d-none');
                    foundProjects = true;
                } else {
                    project.classList.add('d-none');
                }
            });
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchProjects');
        const projectsContainer = document.getElementById('projectsContainer');

        searchInput.addEventListener('input', function (e) {
            const searchText = e.target.value.toLowerCase();
            const projects = document.querySelectorAll('.project-item');
            let foundProjects = false;

            projects.forEach(project => {
                const title = project.querySelector('.card-title').textContent.toLowerCase();
                if (title.includes(searchText)) {
                    project.classList.remove('d-none');
                    foundProjects = true;
                } else {
                    project.classList.add('d-none');
                }
            });

            // Mostrar mensaje cuando no hay resultados
            const noResultsMessage = document.querySelector('.no-results');
            if (!foundProjects) {
                if (!noResultsMessage) {
                    const message = document.createElement('div');
                    message.className = 'col-12 text-center py-5 no-results';
                    message.innerHTML = `
            // Mostrar mensaje cuando no hay resultados
            const noResultsMessage = document.querySelector('.no-results');
            if (!foundProjects) {
                if (!noResultsMessage) {
                    const message = document.createElement('div');
                    message.className = 'col-12 text-center py-5 no-results';
                    message.innerHTML = `
                    <div class="alert alert-info d-inline-block">
                        <i class="fas fa-search me-2"></i>
                        No se encontraron proyectos que coincidan con "${searchText}"
                    </div>
                `;
                    projectsContainer.appendChild(message);
                }
            } else if (noResultsMessage) {
                noResultsMessage.remove();
            }
        });
    });
                    projectsContainer.appendChild(message);
                }
            } else if (noResultsMessage) {
                noResultsMessage.remove();
            }
        });
    });
</script>