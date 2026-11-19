# Sistema Web de Gestión de Matrículas y Seguimiento Académico
Proyecto integrador de DSI406 Tecnología Backend (Laravel + PostgreSQL)[cite: 3, 5].
## Requisitos
- PHP 8.3 o superior con pdo_pgsql[cite: 5]
- Composer 2 y PostgreSQL[cite: 5]
## Instalación
1. git clone https://github.com/bmpc17/sistema-matriculas.git[cite: 1, 2]
2. cd sistema-matriculas
3. composer install[cite: 5]
4. copy .env.example .env (y completar DB_PASSWORD)[cite: 5]
5. php artisan key:generate[cite: 5]
6. Crear la base de datos sistema_matriculas en PostgreSQL[cite: 1, 5]
7. php artisan migrate[cite: 5]
8. php artisan serve[cite: 5]

Autor: BRUNO MANUEL PAUCCAR CONDORI

## Datos de prueba
Comando para reconstruir y poblar la base de datos:
`php artisan migrate:fresh --seed`

| Usuario                 | Rol           | Contraseña |
|-------------------------|---------------|------------|
| director@colegio.test   | administrador | password   |
| docente@colegio.test    | docente       | password   |
| secretaria@colegio.test | secretaria    | password   |