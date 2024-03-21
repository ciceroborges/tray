## O Projeto:
Este projeto foi construido com o intuito de gerenciar vendas, vendedores e cálculo de comissão
dessas vendas (8.5% sobre o valor da venda).

## Funcionalidades:
A aplicação conta com as seguintes funcionalidades:
- Autenticação em geral:  
    - cadastro e login de usuários;
    - edição de perfil (nome, email e senha);
    - gerenciamento de sessões;
    - exclusão de conta.
- Listagem de vendedores:
    - id, nome, email, total de comissoes, total de vendas e vendas realizadas.
- Criação e exclusão de vendedores:
    - nome e email.
- Gestão de Vendas:
    - lançamento de novas vendas;
    - listagem de vendas por vendedor.
- Notificação por email:
    - É disparado um email aos usuários com o resumo de cada nova venda lançada;
    - É disparado um email aos usuários uma diariamente com um relatório de todas as vendas do dia juntamente com o valor total das vendas e comissões;

## Tecnologias:
Este projeto foi construido com a versão mais recente do Laravel 11 até o momento. Durante o desenvolvimento foram utilizadas diversas tecnologias como: 
- Vue3, 
- Inertia, 
- Jetstream, 
- Sail, 
- Fortify, 
- Sanctum, 
- Ziggy, 
- PHPUnit,
- entre outras...

## Padrões de projeto
Utilizei alguns patterns como: 
- Service Layer: 
    - Padrão arquitetural que separa a lógica de negócios do resto da aplicação;
- Repository Pattern:
    - Padrão de design que abstrai o acesso aos dados, isolando o código de negócios da forma como os dados são armazenados e recuperados.
- Observer Pattern:
    - Padrão comportamental que define uma relação de dependência entre objetos de modo que quando um objeto muda de estado, todos os seus dependentes são notificados e atualizados automaticamente;
- Event/Listener Pattern: 
    - Padrão usado para implementar a comunicação assíncrona e desacoplada entre partes do sistema.
- Event Queue:
    - Técnica frequentemente usada em sistemas que lidam com eventos assíncronos ou operações demoradas. Os eventos são colocados em uma fila e processados em ordem, garantindo que não haja interrupções na execução do sistema enquanto eventos são processados em segundo plano.


## Instalação
1 - Após clonar o projeto crie um arquivo .env a partir do .env.example.

2 - Instale o composer, node.js, docker e o docker compose no seu SO.

3 - Encerre todos os serviços rodando na sua máquina que usam as portas padrões do nginx/apache e mysql (80, 443, 3306, etc...).

4 - Instale as dependencias do projeto

```sh
composer install && npm install
```

5 - Execute o comando abaixo na raiz do projeto para subir e startar os containers em segundo plano

```sh
./vendor/bin/sail up
```

6 - Execute o comando abaixo para gerar uma chave única para o aplicativo 

```sh
./vendor/bin/sail artisan key:generate
```

7 - Execute o comando abaixo para criar as tabelas do banco de dados

```sh
./vendor/bin/sail artisan migrate:fresh
```

## Inicialização
```sh
// startar os containers
./vendor/bin/sail up

// startar o worker das queues
./vendor/bin/sail artisan queue:work 

// startar o worker dos schedules
./vendor/bin/sail artisan schedule:work 

// startar o vite para compilar o front
npm run dev
```

## Comandos úteis
```sh
// para rodar os testes...
./vendor/bin/sail artisan test

// para visualizar os events / listeners registrados...
./vendor/bin/sail artisan event:list

// para visualizar os schedule registrados...
./vendor/bin/sail artisan schedule:list

// para reiniciar os processos das queues...
./vendor/bin/sail artisan queue:restart
```