# API - Sistema de Notícias

Trata-se de um sistema de postagem de notícias aonde é possivel inserir noticias com imagens e postar comentários para cada notícia.

## Desenvolvimento
Para o ambiente de desenvolvimento foi utilizado o **PHP 8.1**, **Laravel 9** e **MySQL 5.4**.

Para facilitar o inicio da aplicação as configurações e teste neste repositório contem os arquivos de ambienação, reforço que não é uma boa prática, porém como é um sistema de testes e não contém informações sensíveis achei melhor manter para focar nos teste da api.

## Model
https://github.com/wevertoncamposdev/API_News_System/blob/main/public/model.pdf


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
  GET|HEAD        api/reports/{reports} ........................................................................ reports.show › Api\CitieController@show  
  PUT|PATCH       api/reports/{reports} .................................................................... reports.update › Api\CitieController@update
  DELETE          api/reports/{reports} .................................................................. reports.destroy › Api\CitieController@destroy 

  Exemplo de rota com uuid:
  http://localhost/api/reports/8379fb45-d3da-4145-a38e-15badae5541a

```

## Route http://localhost/api/comments

Criar/Listar/Editar/Excluir um novo comentário
#### Visão Geral



```
  GET|HEAD        api/comments ....................................................................... comments.index › Api\CommentController@index  
  POST            api/comments ....................................................................... comments.store › Api\CommentController@store  
  GET|HEAD        api/comments/{comment} ............................................................... comments.show › Api\CommentController@show  
  PUT|PATCH       api/comments/{comment} ........................................................... comments.update › Api\CommentController@update  
  DELETE          api/comments/{comment} ......................................................... comments.destroy › Api\CommentController@destroy 

  Exemplo de rota com uuid:
  http://localhost/api/comments/8379fb45-d3da-4145-a38e-15badae5541a

```

## Route http://localhost/api/images

Criar/Listar/Editar/Excluir uma nova imagem para a noticia

#### Visão Geral


```
  GET|HEAD        api/images ............................................................................. images.index › Api\ImageController@index  
  POST            api/images ............................................................................. images.store › Api\ImageController@store  
  GET|HEAD        api/images/{image} ....................................................................... images.show › Api\ImageController@show  
  PUT|PATCH       api/images/{image} ................................................................... images.update › Api\ImageController@update  
  DELETE          api/images/{image} ................................................................. images.destroy › Api\ImageController@destroy   
  
  Exemplo de rota com uuid:
  http://localhost/api/image/8379fb45-d3da-4145-a38e-15badae5541a

```


## Route http://localhost/api/trash

Listar dados arquivados

#### Visão Geral
Ao deletar qualquer registro ele não será excluído do banco de dados, será arquivado e por meio desta rota é possível lista os registros arquivados.

```
  GET|HEAD        api/trash ............................................................................... trash.index › Api\TrashController@index  
  GET|HEAD        api/trash/{trash} ......................................................................... trash.show › Api\TrashController@show
  GET|HEAD        api/trash/{trash} ......................................................................... trash.show › Api\TrashController@show  
  PUT|PATCH       api/trash/{trash} ..................................................................... trash.update › Api\TrashController@update  
  DELETE          api/trash/{trash} ................................................................... trash.destroy › Api\TrashController@destroy 

  Exemplo da rota com o parametro ?table:
  http://localhost/api/trash?table=reports

```


### Autor <br>
<img src="https://github.com/wevertoncamposdev.png" width=115><br><sub>Weverton Campos</sub>
