# FIX teste backend

## Requisitos

- docker: 20.10.14
- docker-compose: 1.24.1
- composer: 2.0.9

## Pacotes utilizados

- phinx

        Util para versionar o banco de dados

- phpdotenv

        Útil para carregar variáveis de ambiente a partir do arquivo .env na raiz do projeto

- router

        Útil para facilitar o roteamento da aplicação

- twig

        Template engine para renderizar os dados vindos do backend no frontend

## Como rodar o projeto

1. Abra um terminal na raíz do projeto

2. Execute `make install` para instalar as dependências necessárias

        - A flag `--ignore-platform-reqs` serve para ignorar os requisitos dos pacotes contidos no composer visto que o que precisar será usado a partir do container do docker e não da sua máquina

        - O argumento migrate fará a migração do banco de dados e o argumento seed:run populará as tabelas do banco de dados

3. Execute `docker-compose up` para rodar os containers

        Espere o container do maria_db retornar que está pronto para connexões para realizar a próxima etapa
  ![retorno](https://i.imgur.com/noWNW5D.png)

4. Acesse <http://localhost:8000> para navegar pelo projeto.