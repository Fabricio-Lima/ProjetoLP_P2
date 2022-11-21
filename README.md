<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/Fabricio-Lima/ProjetoLP_P2/blob/v2/public/farmacia-logo.png" width="200"></a></p>

## Sobre o Projeto

Projeto P2 das disciplinas de Linguagem de Programação IV e Banco de Dados I, ministrados pela prof. ª Luciana Ferreira Baptista, da Faculdade de Tecnologia de Jundiaí - Deputado Ary Fossen. 

## Objetivo do Projeto

A criação de uma plataforma de solicitação de pedidos, com controle de usuários, produtos e fornecedores, com autenticação baseada em SESSION para controle de acesso.

## Tecnologias

- [PHP 8](https://www.php.net/)
- [Laravel Framework](https://laravel.com/)
- [Jetstream](https://jetstream.laravel.com/2.x/introduction.html)
- [HTML](https://developer.mozilla.org/pt-BR/docs/Web/HTML)
- [CSS](https://developer.mozilla.org/pt-BR/docs/Web/CSS)
- [TailwindCSS](https://tailwindcss.com/)
- [TailwindUI](https://tailwindui.com/)
- [Database MySQL](https://www.mysql.com/)
- [Node.js](https://nodejs.org/en/)
- [Composer](https://getcomposer.org/download/)

# Instalação

Requisitos:
- Composer
- PHP 8
- Possuir uma instância MySQL
- Node.js v16 ou superior

## Configurando credenciais de acesso do Banco de Dados

Edite as informações abaixo, adicionando suas credenciais:

``DB_CONNECTION=mysql
DB_HOST=ip_do_seu_banco_de_dados
DB_PORT=3306
DB_DATABASE=nome_banco_de_dados
DB_USERNAME=usuario_banco_de_dados
DB_PASSWORD=senha_banco_de_dados
``

Cole as informações acima, no arquivo .env

```bash
# Instalar as dependências Laravel
$ composer update && npm install

# Adicionando Migrations e Seeders
$ php artisan migrate --seed

# Iniciando a aplicação
$ php artisan serve
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
