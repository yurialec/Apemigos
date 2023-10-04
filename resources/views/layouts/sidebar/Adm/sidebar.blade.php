<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="height: 100vh">
    <a href=" {{route('adm.index')}}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi pe-none me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">Administrativo</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <a href="{{route('adm.IndexRole')}}" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#speedometer2"></use>
                </svg>
                Níveis de Acesso
            </a>
        </li>
        <li>
            <a href="{{route('adm.IndexPermission')}}" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#speedometer2"></use>
                </svg>
                Permissões
            </a>
        </li>
        <li>
            <a href="{{route('adm.IndexUser')}}" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#speedometer2"></use>
                </svg>
                Usuários
            </a>
        </li>
    </ul>
</div>