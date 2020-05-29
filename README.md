## CSToke - controle de estoque (Em desenvolvimento)

> Sistema de Controle de Estoque
---
#### Frontend
- CSS3
- Laravel Bootstrap UI
- HTML5
- JQuery

#### Backend
PHP 7.3.5 (cli) (built: May  1 2019 13:17:17) ( ZTS MSVC15 (Visual C++ 2017) x64 )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.3.5, Copyright (c) 1998-2018 Zend Technologies

Laravel Framework 7

#### Banco de Dados
- MySQL 5.7

---

### Instalação
#### Usuário
- Email: admin@cstoke.com.br
- Senha: 00000

#### Pré Requisitos
- $ cp .env.example .env
- create local database

#### Backend
- $ composer install  
- $ php artisan key:generate
- $ php artisan storage:link

#### Banco de Dados
- $ php artisan migrate:refresh --seed (carrega a massa de dados)
