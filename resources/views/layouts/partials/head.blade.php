<head>
    <h3>
        <ul>
            <li>
                <a href={{ route('home') }} class={{ request()->routeIs('home') ? 'active' : '' }}>Home</a>
            </li>
            <li>
                <a href={{ route('curso.index') }} class={{ request()->routeIs('curso*') ? 'active' : '' }}>Cursos</a>
            </li>
            <li>
                <a href={{ route('nosotros') }} class={{ request()->routeIs('nosotros') ? 'active' : '' }}>Nosotros</a>
            </li>
            <li>
                <a href={{ route('contactanos.index') }} class={{ request()->routeIs('contactanos.index') ? 'active' : '' }}>Contactanos</a>
            </li>
        </ul>
    </h3>
</head>
