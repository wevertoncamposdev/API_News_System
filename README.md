# Laravel Api RESTful - Sistema de Notícias

trata-se de um sistema de postagem de notícias aonde é possivel inserir noticias com imagens e postar comentários para cada notícia.

## Desenvolvimento
Para o ambiente de desenvolvimento foi utilizado o **PHP 8.1**, **Laravel 9** e **MySQL 5.4**.

Para facilitar o inicio da aplicação as configurações e teste neste repositório contem os arquivos de ambienação, reforço que não é uma boa prática, porém como é um sistema de testes e não contém informações sensíveis achei melhor manter para focar nos teste da api.


## Iniciando a aplicação

Para criar o banco de dados e popular com registros para testes digite os seguintes comandos

```
php artisan migrate --seed
yes 

```
Após finalizar o processo de configuração é possível acessar http://localhost .

Se for necessário é possível acessar o phpmyadmin http://localhost:8081

Para realizar requisições de teste via **Postman** importe as coleções que estão na pasta

```
./postman

```
## Model
https://github.com/wevertoncamposdev/apiprojectbywevertoncampos/blob/main/public/model.pdf


### Observações Gerais

>Declaro que reconheço a possívebilidade de realizar algumas melhorias em alguns pontos específicos porém abaixo estou descriminando o racíocinio lógico da api e as possíbilidades analisadas.

Pensando em **sergurança** foi utilizado o método **UUID** que gera um identificador único para o registro evitando passar o **ID** no frontend.


De forma prática para manter a rastreabilidade dos dados foi utilizado o método softDeletes
Para verificar os registros arquivados acesse a rota http://localhost/api/trash?table=reports passando a tabela como parametro.

```
O softDeletesTz este método adiciona uma deleted_at TIMESTAMP coluna equivalente anulável (com fuso horário) com uma precisão opcional (total de dígitos). Esta coluna destina-se a armazenar o deleted_attimestamp necessário para a funcionalidade de "exclusão reversível" do Eloquent:
```
font: https://laravel.com/docs/9.x/migrations#column-method-softDeletesTz


### Descrição da API




## Route http://localhost/api/reports

Criar/Listar/Editar/Excluir uma nova noticia

#### Visão Geral


```
  GET|HEAD        api/reports ............................................................................. reports.index › Api\CitieController@index  
  POST            api/reports ............................................................................. reports.store › Api\CitieController@store  
  GET|HEAD        api/reports/{city} ........................................................................ reports.show › Api\CitieController@show  
  PUT|PATCH       api/reports/{city} .................................................................... reports.update › Api\CitieController@update
  DELETE          api/reports/{city} .................................................................. reports.destroy › Api\CitieController@destroy 

  Exemplo de rota com uuid:
  http://localhost/api/cities/8379fb45-d3da-4145-a38e-15badae5541a

```

## Route http://localhost/api/comments

Criar/Listar/Editar/Excluir um novo comentário
#### Visão Geral



```
  GET|HEAD        api/comments ....................................................................... comments.index › Api\ProductController@index  
  POST            api/comments ....................................................................... comments.store › Api\ProductController@store  
  GET|HEAD        api/comments/{product} ............................................................... comments.show › Api\ProductController@show  
  PUT|PATCH       api/comments/{product} ........................................................... comments.update › Api\ProductController@update  
  DELETE          api/comments/{product} ......................................................... comments.destroy › Api\ProductController@destroy  

  Exemplo de rota com uuid:
  http://localhost/api/comments/8379fb45-d3da-4145-a38e-15badae5541a

```

## Route http://localhost/api/images

Criar/Listar/Editar/Excluir uma nova imagem para a noticia

#### Visão Geral


```
  GET|HEAD        api/campaigns .................................................................... campaigns.index › Api\CampaignController@index  
  POST            api/campaigns .................................................................... campaigns.store › Api\CampaignController@store  
  GET|HEAD        api/campaigns/{campaign} ........................................................... campaigns.show › Api\CampaignController@show  
  PUT|PATCH       api/campaigns/{campaign} ....................................................... campaigns.update › Api\CampaignController@update  
  DELETE          api/campaigns/{campaign} ..................................................... campaigns.destroy › Api\CampaignController@destroy  
  Exemplo de rota com uuid:
  http://localhost/api/campaigns/8379fb45-d3da-4145-a38e-15badae5541a

```


## Route http://localhost/api/trash

Criar/Listar/Editar/Excluir uma nova cidade
#### Visão Geral
Ao deletar qualquer registro ele não será excluído do banco de dados, será arquivado e por meio desta rota é possível lista os registros arquivados.

```
  GET|HEAD        api/trash ............................................................................... trash.index › Api\TrashController@index  
  GET|HEAD        api/trash/{trash} ......................................................................... trash.show › Api\TrashController@show
  GET|HEAD        api/trash/{trash} ......................................................................... trash.show › Api\TrashController@show  
  PUT|PATCH       api/trash/{trash} ..................................................................... trash.update › Api\TrashController@update  
  DELETE          api/trash/{trash} ................................................................... trash.destroy › Api\TrashController@destroy 

  Exemplo da rota com o parametro ?table:
  http://localhost/api/trash?table=cities

```


### Autor <br>
<img src="https://github.com/wevertoncamposdev.png" width=115><br><sub>Weverton Campos</sub>
