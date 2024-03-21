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
