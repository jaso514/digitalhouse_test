Pasos para la instalación

Crear el archivo .env a partir de .env.example
Agregar datos de la base de datos.
Ejecutar composer install
Ejecutar php artisan key:generate

Ejecutar en la BD:
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (1, 'admin', 'admin@test.com', '$2y$10$gOMwCbwJay.tk6lkmo6sYeO0laQDlyMJsdXHs4VbtODZNy4Uo6o4m', NULL, NULL, NULL);

