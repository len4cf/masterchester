<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Laravel Build - WSL2 + Docker

### :: Criando um novo projeto

Comando CURL Sail on Linux: 
```shell
curl -s https://laravel.build/example-app | bash
```

Comando CURL Sail com services predefinidos: 
```shell
curl -s https://laravel.build/example-app?with=mysql,redis,mailpit,phpmyadmin,debugger | bash
```

>Lembrar de colocar o nome do projeto em `example-app`
>``` Shell
>php artisan route:list



Para adicionar outros services coloque o nome da imagem do docker separado por vírgula.

`Lembrar` de trocar o example-app para o `nome do projeto`. [Documentação oficial do Laravel](https://laravel.com/docs/11.x#sail-on-windows)

Iniciando sail fora do Docker:
```shell
cd example-app
./vendor/bin/sail up
```

Migração inicial:
```shell
./vendor/bin/sail artisan migrate
```
---
### :: Artisan Commands
[Documentação oficial do Laravel](https://laravel.com/docs/10.x/artisan#introduction)
```shell
php artisan list
```
---
Usando barra de debugger no navegador
```shell
composer require barryvdh/laravel-debugbar --dev
```
Detalhes sobre a [DebugBar for Laravel](https://github.com/barryvdh/laravel-debugbar)

---
### :: Instalando PACK tradução Laravel - BR

1.  Scaffold do diretório lang

```shell
php artisan lang:publish
```

2.  Instalando o pacote

```shell
composer require lucascudo/laravel-pt-br-localization --dev
```

3.  Publicando as traduções

```shell
php artisan vendor:publish --tag=laravel-pt-br-localization
```

4.  Configure o Framework para utilizar 'pt_BR' como linguagem padrão

```
-- Altere Linha 85 do arquivo config/app.php para:
'locale' => 'pt_BR'

-- Alterar arquivo .env
APP_LOCALE=pt_BR
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=pt_BR

```

---
## Dependências

### :: Filament
[Documentação oficial do Filament 3.x](https://filamentphp.com/docs)
1. Instalando o Filament framework completo (Panel, Tables, Widgets, Notifications)
``` Shell
composer require filament/filament:"^3.2" -W
 
php artisan filament:install --panels

php artisan vendor:publish --tag=filament-config
```
2. Criando um usuário
``` Shell
php artisan make:filament-user
```
3. Notificações
``` Shell
composer require filament/notifications:"^3.2" -W

php artisan filament:install --scaffold --notifications

npm install

npm run dev

php artisan make:notifications-table
```
Se o projeto laravel já existir
``` Shell
php artisan filament:install --notifications
```
4. Temas

``` Shell
php artisan make:filament-theme
```
5. Resources

``` Shell
php artisan make:filament-resource NomeModelClass --Generate
```
6. Widgets
- Stats 
``` Shell
php artisan make:filament-widget WidgetStatName --stats-overview
``` 
- Charts 
``` Shell
php artisan make:filament-widget WidgetChartName --chart
```
- Tables 
``` Shell
php artisan make:filament-widget WidgetTableName --table
```
- Exibir Widgets em View do Livewire 
``` bladehtml
<div>
    @livewire(\App\Livewire\Dashboard\WidgetChartName::class)
</div>
```
---
### :: Livewire
[Documentação oficial do Livewire 3.x](https://livewire.laravel.com/docs/quickstart)

1. Por padrão o livewire já é um dependência do Filament, portanto ele é instalado automaticamente. Segue abaixo o comando de instalação.

``` Shell
composer require livewire/livewire
```

``` Shell
php artisan vendor:publish --tag=filament-config
```

## Laravel Broadcasting
### :: Instalação Reverb + Echo


Instalando Laravel Reverb

``` Shell
composer require laravel/reverb:@beta

php artisan reverb:install
```
O comando 'Artisan' `install:broadcasting` equivale ao `reverb:install`
```
php artisan install:broadcasting
```

Instalando Laravel Echo.js
``` Shell
npm install --save-dev laravel-echo pusher-js
```
Incluido import baseado no .env
``` php
import Echo from 'laravel-echo'
import Pusher from 'pusher-js'
window.Pusher = Pusher
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
    wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
    wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
    wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
})
```
Incluindo no Config/filament.php

``` php
'broadcasting' => [

        'echo' => [
            'broadcaster' => 'reverb',
            'key' => env('VITE_REVERB_APP_KEY'),
            'cluster' => env('VITE_REVERB_APP_CLUSTER'),
            'wsHost' => env('VITE_REVERB_HOST'),
            'wsPort' => env('VITE_REVERB_PORT'),
            'wssPort' => env('VITE_REVERB_PORT'),
            'authEndpoint' => '/broadcasting/auth',
            'disableStats' => true,
            'encrypted' => true,
            'forceTLS' => false,
        ],

    ],
```
Verificar se o Boostrap.js está importando o Echo.js
`import './echo';`
---
### :: Configurando e iniciando o servidor WebSocket

Verifique se as configurações do servidor estão configuradas no `.env`
``` env
BROADCAST_CONNECTION=reverb

REVERB_APP_ID=99999
REVERB_APP_KEY=cibft7mw2kkknfrqitvx
REVERB_APP_SECRET=kluqjdtmlutmn1amdyae
REVERB_HOST="localhost"
REVERB_PORT=8090
REVERB_SCHEME=http

VITE_REVERB_APP_KEY="${REVERB_APP_KEY}"
VITE_REVERB_HOST="${REVERB_HOST}"
VITE_REVERB_PORT="${REVERB_PORT}"
VITE_REVERB_SCHEME="${REVERB_SCHEME}"
```

Verifique se a porta `'${REVERB_SERVER_PORT:-8090}:8090'` do servidor Reverb está configurada no `docker-compose.yml`
``` dockerfile
services:
    laravel.test:
        build:
            context: ./vendor/laravel/sail/runtimes/8.3
            dockerfile: Dockerfile
            args:
                WWWGROUP: '${WWWGROUP:-1000}'
        image: sail-8.3/app
        extra_hosts:
            - 'host.docker.internal:host-gateway'
        ports:
            - '${APP_PORT:-80}:80'
            ***- '${REVERB_SERVER_PORT:-8090}:8090'***
            - '${VITE_PORT:-5173}:${VITE_PORT:-5173}'
            
....
```
Verifique a necessidade de ajustar configurações do Reverb em `Config\broadcasting.php`

Iniciando o servidor Reverb WebSocket
``` Shell
php artisan reverb:start
```
Comandos start aprimorados
``` Shell
php artisan reverb:start --host=127.0.0.1 --port=9000
```
```
php artisan reverb:start --host="0.0.0.0" --port=8090 --hostname="laravel.test"
```
``` Shell
php artisan queue:work
```
## Security, Auth, Policies, Gates

### Spatie Permissions
[Documentação oficial Spatie](https://spatie.be/docs/laravel-permission/v6/installation-laravel)

instalando pacote
```shell
 composer require spatie/laravel-permission
```

```php
'providers' => [
    // ...
    Spatie\Permission\PermissionServiceProvider::class,
];
```
Publicando as migrations
```shell
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan optimize:clear
php artisan migrate
```

```php
 // The User model requires this trait
 use HasRoles;
```


## Rebuild de aplicações existentes

### Rebuild

#### Criando novo arquivo de configuração de ambiente
```shell
cp env.base .env

```
```shell
sudo chmod -R 777 .env
```
#### Limpando cache config Laravel
*Opicionalmente faça a limpeza do cache - não vai funcionar se não tiver instalado as dependências pelo docker run*
```shell
bash ./vendor/bin/sail artisan config:clear
```
```shell
bash ./vendor/bin/sail artisan key:generate
```
#### Instalando as dependências do projeto existente - docker run de containar externo com Sail+Composer+PHP83
```shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```
#### Comandos para manutenção do Docker
```shell
bash ./vendor/bin/sail up -d
```
```shell
bash ./vendor/bin/sail build
```
```shell
bash ./vendor/bin/sail down
```
#### Instalando as dependências do NPM + Config do Vite + Cache Web Public
```shell
bash ./vendor/bin/sail npm install
```
```shell
bash ./vendor/bin/sail npm run build
```
```shell
bash ./vendor/bin/sail artisan config:cache
```
#### Comandos start DataSet / Database
Comando de migração com população do usuário admin
```shell
bash ./vendor/bin/sail artisan migrate --seed --seeder=DatabaseSeeder
```
Comando de migração com refresh da database
```shell
bash ./vendor/bin/sail artisan migrate:fresh --seed --seeder=DatabaseSeeder
```
## Processo do Git e Controle de versão

### Comandos Git no terminal 

Para atualizar a branch de desenvolvimento com a as atualizações vindo da branch develop

Criar nova branch a partir da develop (opcional)
```shell
git checkout -b nome_da_sua_branch
```
Publicar nova branch no repositorio remoto (opcional)
```shell
 git push --set-upstream origin nome_da_sua_branch
```
Verificar todas as suas branchs (opcional)
```shell
git branch
```
Atualizar a develop
```shell
git checkout develop
git pull 
```
Trocar para a sua branch de desenvolvimento
```shell
git checkout nome_da_sua_branch
```
Dar o merge das atualizações da develop para sua branch, dar o ctrl+x após o comando para fechar o editor de texto
```shell
git merge develop
```
Dar o push para publicar suas atualizações na branch
```shell
git push
```
Deletar branch de desenvolvimento (opcional)
```shell
git branch -d nome_da_sua_branch
```
