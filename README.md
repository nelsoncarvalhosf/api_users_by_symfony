# API User - PHP

## Requisitos funcionais
1. Endpoint para criação de um novo usuário (POST /users)
1.1 Usuário deve ser validado antes de persistido no banco de dados e, caso não esteja válido, o código de erro 400 deve ser retornado junto com a lista de erros encontrados
2. Endpoint para listar todos os usuários cadastrados no banco de dados (GET /users)
3. Endpoint para alteração de um usuário (PUT /users/{id})
3.1 Usuário deve ser validado antes de persistido no banco de dados e, caso não esteja válido, o código de erro 400 deve ser retornado junto com a lista de erros encontrados
3.2 Usuário deve existir na base e, caso contrário, o código de erro 404 com uma mensagem apropriada deve ser retornada
4. Endpoint para remoção de um usuário (DELETE /users/{id})
4.1 Usuário deve existir na base e, caso contrário, o código de erro 404 com uma mensagem apropriada deve ser retornada
5. Endpoint para visulizar detalhes de um usuário (GET /users/{id})
5.1 Usuário deve existir na base e, caso contrário, o código de erro 404 com uma mensagem apropriada deve ser retornada

### Modelagem

Cada usuário deve conter as seguintes informações:

1. Nome
2. Sobrenome
3. E-mail
4. Telefones
4.1. Código de área (31, 33 e etc)
4.2. Número no formato XXXX-XXXX
5. Endereço
5.1 Estado
5.2 Cidade
5.3 Bairro
5.4 Rua
5.5 Número
5.6 Complemento

OBS: Cada usuário possui um ou mais telefones

OBS: Cada usuário possui um endereço

Desta forma, teremos um total de três tabelas (user, user_address, user_contact_phone)

## Requisitos não-funcionais
1. Requisições e respostas da API devem ser no formato JSON
2. API deve conter testes funcionais para garantir que a aplicação está funcionando corretamente
3. Devemos incluir uma integração contínua no GitHub Actions para buildar e rodar os testes automaticamente a cada "git push"

## Como rodar a aplicação

1. composer i
2. php bin/console doctrine:database:create
3. php bin/console doctrine:migrations:migrate