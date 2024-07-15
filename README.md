# Signatures API

## Sobre o projeto

Este é um projeto simples de estudo, focado em desenvolvedor e conhecer o enorme ecossistema do framework laravel

## Requisitos
**Docker**

## Instalação

Siga os passos abaixo para configurar e rodar o projeto:

1. **Clone o repositório**:
    ```bash
   git clone git@github.com:marquescript/signatures-api.git
    ```
2. **Gere a chave da aplicação**:
      ```bash
    ./vendor/bin/sail artisan key:generate
    ```
3. **Inicie os containers do Docker**:
    ```bash
    ./vendor/bin/sail up -d
    ```
4. **Caso deseje encerrar a aplicação, execute**:
    ```bash
    ./vendor/bin/sail down
    ```    

## Utilização

Após completar a configuração, você pode acessar a aplicação via Insomnia ou Postman em `http://localhost`

**Para visualização das rotas da api, acesse o arquivo** ``Swagger.json``
