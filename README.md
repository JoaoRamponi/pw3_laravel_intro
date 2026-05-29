# 1. Verificar se PHP está instalado
php -v

# 2. Verificar se Composer está instalado
composer -V

# 3. Criar o projeto Laravel
composer create-project laravel/laravel nome_do_projeto

# 4. Entrar na pasta do projeto
cd nome_do_projeto

# 5. Gerar chave de segurança
php artisan key:generate

# 6. Configurar o banco no arquivo .env

# 7. Criar model + migration
php artisan make:model livros -m

# 8. Criar controller
php artisan make:controller livrosController

# 9. Editar a migration

# 10. Executar as migrations
php artisan migrate

# 11. Rodar o servidor
php artisan serve
