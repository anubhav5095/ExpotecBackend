[English version](#The-use-of-the-framework)
# O uso do framework

Você pode usar o projeto do <a href="https://github.com/Expotec2017/ExpotecDocker" target="\_blank">container docker</a> que o @felipefrizzo fez, ou pode usar um semi-tutorial abaixo.

## O Artisan

Se você observar o projeto, você encontrará um arquivo chamado "artisan". Esse arquivo é um """"executável"""" do laravel para a criação de diversos itens do projeto, como migrations, controllers, models e assim vai. Além disso, ele é usado para executar comandos que são para executar o servidor de desenvolvimento local, migrar databases e assim vai(novamente...).

O nome artisan(Artesão) tem tudo a ver até com o framework: o Laravel diz que é para os Artesões da Web... :)

# O semi-tutorial

Requisitos:
- PHP (Mínimo PHP5) - https://blog.schoolofnet.com/2015/04/como-instalar-o-php-no-windows-do-jeito-certo-e-usar-o-servidor-embutido/;
- MariaDB (ou MySQL) - https://downloads.mariadb.org/;

## Pré-configurações

Com os requisitos instalados e configurados, vamos à configuração das variáveis de ambiente do Laravel.
copie o arquivo .env.example para .env e faça algumas alterações:

  Troque os seguintes campos para os dados de acesso ao banco. É necessário que tenha um banco de dados cadastrado para uso do laravel.

  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=homestead
  DB_USERNAME=homestead
  DB_PASSWORD=secret

## Baixando as dependências

Abra o CMD e acesse a pasta do projeto e baixe o composer(https://getcomposer.org/download/).

Após os comandos informados no site tenham sido executados, execute: "php composer.phar install"
Esse processo pode demorar um pouco. Ele vai baixar todas as dependências do projeto. Além disso, ele vai gerar uma chave que o projeto irá utilizar, mas enfim, isso é da parte de execução do Laravel.

## Migrando a base de dados

Com as dependências do projeto baixadas e as variáveis de ambiente configuradas, vamos migrar o banco de dados.
No laravel, temos arquivos de configuração que geram as tabelas do banco, esses são chamados de <i>migrations</i>.

Para executar as migrations é necessário apenas executar o seguinte comando do artisan: "php artisan migrate".

## Executando o servidor de testes

Agora estamos próximos de executar o inicial do projeto, mas antes temos que ter uma certeza: O laravel usa a porta 8000 do seu computador para poder executar o servidor de testes, então, tenha certeza que nenhum outro aplicativo ou software esteja usando essa porta para evitar problemas de execução.

Para executar o servidor de testes, execute no cmd na pasta do projeto: "php artisan serve".
Se tudo der certo ele vai aparecer o seguinte: <i>Laravel development server started: <http://127.0.0.1:8000></i>.
Se isso aconteceu, pode acessar o link que está aparecendo no cmd e você terá acesso ao servidor de testes.


# Não estou conseguindo executar aqui em meu computador dessa forma!

Então, utilize o <a href="https://github.com/Expotec2017/ExpotecDocker" target="\_blank">container docker</a> que o @felipefrizzo fez, é mais certo que irá funcionar.


*English*
# The use of the framework
You can use the docker container design that @felipefrizzo did, or you can use a semi-tutorial below.

# The Artisan
If you look at the project, you will find a file called "artisan". This file is a "" executable for the laravel "" for creating various project items such as migrations, controllers, models and so on. Also, it is used to execute commands that are to run the local development server, migrate databases and so on (again ...).

The name artisan (Craftsman) has everything to do with the framework: Laravel says it's for the Crafters of the Web ... :)

# The semi-tutorial
Requirements:

PHP (PHP5 Minimal) - https://blog.schoolofnet.com/2015/04/how-to-install-the-php-no-windows-of-the-right-right-and-use-the-consumerserver/;
MariaDB (or MySQL) - https://downloads.mariadb.org/;

# Presets
With the requirements installed and configured, we will configure the Laravel environment variables. copy the .env.example file to .env and make some changes:

Change the following fields for the bank access data. It is necessary that you have a database registered for laravel use.

 DB_HOST = 127.0.0.1 
 DB_PORT = 3306 
 DB_DATABASE = homestead 
 DB_USERNAME = homestead 
 DB_PASSWORD = secret

# Downloading dependencies
Open the CMD and go to the project folder and download the composer (https://getcomposer.org/download/).

After the commands entered on the site have been executed, run: "php composer.phar install" This process may take a while. It will download all the dependencies of the project. Also, it will generate a key that the project will use, but anyway, this is the running part of Laravel.

# Migrating the Database
With the project dependencies downloaded and the environment variables configured, let's migrate the database. In laravel, we have configuration files that generate the tables of the bank, these are called migrations.

To execute the migrations it is only necessary to execute the following artisan command: "php artisan migrate".

# Running the Test Server
Now we are close to running the initial project but before we have to be sure: laravel uses port 8000 on your computer to run the test server, so make sure no other application or software is using that port to avoid execution problems.

To run the test server, run cmd in the project folder: "php artisan serve". If all goes well it will appear the following: Laravel development server started: http://127.0.0.1:8000. If this happened, you can access the link that is appearing in cmd and you will have access to the test server.

I'm not able to run here on my computer that way!
So, use the docker container that @felipefrizzo did, it's more likely that it will work.
