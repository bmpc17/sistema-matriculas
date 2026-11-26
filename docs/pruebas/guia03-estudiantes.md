# Pruebas unitarias del módulo Estudiantes (Guía 03)

Fecha: 26/11/2026 · Responsable: Bruno Manuel Pauccar Condori

| Caso | Acción / Descripción | Resultado esperado | RF / RN | Resultado | Observación |
|------|----------------------|--------------------|---------|-----------|-------------|
| CP01 | Abrir /estudiantes | 10 estudiantes, total 50, «Siguiente »» | RF05 | OK | |
| CP02 | Buscar un DNI existente | Un solo estudiante | RF05 | OK | |
| CP03 | Buscar parte de un apellido en minúsculas | Solo las coincidencias | RF05 | OK | |
| CP04 | Con búsqueda activa, ir a la página 2 | La URL conserva ?buscar= | RF05 | OK | |
| CP05 | Guardar el formulario vacío | Errores en español en los obligatorios | RF04 | OK | |
| CP06 | DNI de 7 dígitos | «exactamente 8 dígitos» y datos conservados | RF04 | OK | |
| CP07 | DNI de un estudiante existente | «Ya existe un estudiante…» | RN01 | OK | |
| CP08 | Fecha de nacimiento futura | «no puede ser futura» | RF04 | OK | |
| CP09 | Celular apoderado 812345678 | «debe empezar con 9» | RF04 | OK | |
| CP10 | Registrar un estudiante válido | Ficha con aviso verde; total 51 | RF04 | OK | |
| CP11 | Editar solo el celular del apoderado | Sin error de DNI; aviso verde | RF06 | OK | |
| CP12 | Editar con el DNI de otro estudiante | «Ya existe un estudiante…» | RF06, RN01 | OK | |
| CP13 | Eliminar un estudiante con matrículas | Aviso rojo; sigue existiendo | RF07 | OK | |
| CP14 | Eliminar el estudiante del CP10 | Aviso verde; total 50 | RF07 | OK | |
| CP15 | Abrir /estudiantes/99999 | Página 404 | RF05 | OK | |