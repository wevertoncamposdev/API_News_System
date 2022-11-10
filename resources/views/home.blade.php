<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API News System</title>
</head>
<style type="text/css">
    .body {
        margin: 0;
    }
    .main{
        margin: 50px;
    }
    .header {
        width: 100%;
        background-color: #3B5998;
        height: 35px;
        margin-top: 0;
    }
</style>

<body>
    <div class="main">

        <h1 id="api-sistema-de-not-cias">API - Sistema de Notícias</h1>
        <p>Trata-se de um sistema de postagem de notícias aonde é possivel inserir noticias com imagens e postar
            comentários
            para cada notícia.</p>
        <h2 id="desenvolvimento">Desenvolvimento</h2>
        <p>Para o ambiente de desenvolvimento foi utilizado o <strong>PHP 8.1</strong>, <strong>Laravel 9</strong> e
            <strong>MySQL 5.4</strong>.
        </p>
        <p>Para facilitar o inicio da aplicação as configurações e teste neste repositório contem os arquivos de
            ambienação,
            reforço que não é uma boa prática, porém como é um sistema de testes e não contém informações sensíveis
            achei
            melhor manter para focar nos teste da api.</p>
        <h2 id="model">Model</h2>
        <p><a
                href="https://github.com/wevertoncamposdev/API_News_System/blob/main/public/model.pdf">https://github.com/wevertoncamposdev/API_News_System/blob/main/public/model.pdf</a>
        </p>
        <h3 id="observa-es-gerais">Observações Gerais</h3>
        <blockquote>
            <p>Declaro que reconheço a possívebilidade de realizar algumas melhorias em alguns pontos específicos porém
                abaixo estou descriminando o racíocinio lógico da api e as possíbilidades analisadas.</p>
        </blockquote>
        <p>Pensando em <strong>sergurança</strong> foi utilizado o método <strong>UUID</strong> que gera um
            identificador
            único para o registro evitando passar o <strong>ID</strong> no frontend.</p>
        <p>De forma prática para manter a rastreabilidade dos dados foi utilizado o método softDeletes
            Para verificar os registros arquivados acesse a rota <a
                href="http://localhost/api/trash?table=reports">http://localhost/api/trash?table=reports</a> passando a
            tabela como parametro.</p>
        <pre><code>O softDeletesTz este <span class="hljs-keyword">m</span>étodo adiciona uma deleted_at TIMESTAMP coluna equivalente anulável (com fuso horário) com uma precisão opcional (<span class="hljs-keyword">total</span> <span class="hljs-keyword">de</span> <span class="hljs-keyword">d</span>ígitos). Esta coluna destina-<span class="hljs-keyword">se</span> a armazenar o deleted_attimestamp necessário para a funcionalidade <span class="hljs-keyword">de</span> <span class="hljs-string">"exclusão reversível"</span> <span class="hljs-keyword">do</span> Eloquent:
</code></pre>
        <p>font: <a
                href="https://laravel.com/docs/9.x/migrations#column-method-softDeletesTz">https://laravel.com/docs/9.x/migrations#column-method-softDeletesTz</a>
        </p>
        <h3 id="descri-o-da-api">Descrição da API</h3>
        <h2 id="route-http-localhost-api-reports">Route <a
                href="http://localhost/api/reports">http://localhost/api/reports</a></h2>
        <p>Criar/Listar/Editar/Excluir uma nova notícia</p>
        <h4 id="vis-o-geral">Visão Geral</h4>
        <pre><code>  GET|HEAD        api/reports ............................................................................. reports.index › Api\CitieController@index  
  POST            api/reports ............................................................................. reports.store › Api\CitieController@store  
  GET|HEAD        api/reports/{reports} ........................................................................ reports.show › Api\CitieController@show  
  PUT|PATCH       api/reports/{reports} .................................................................... reports.update › Api\CitieController@update
  DELETE          api/reports/{reports} .................................................................. reports.destroy › Api\CitieController@destroy 

  Exemplo de rota com uuid:
  http:<span class="hljs-comment">//localhost/api/reports/8379fb45-d3da-4145-a38e-15badae5541a</span>
</code></pre>
        <h2 id="route-http-localhost-api-comments">Route <a
                href="http://localhost/api/comments">http://localhost/api/comments</a></h2>
        <p>Criar/Listar/Editar/Excluir um novo comentário</p>
        <h4 id="vis-o-geral">Visão Geral</h4>
        <pre><code>  GET|HEAD        api/comments ....................................................................... comments.index › Api\CommentController@index  
  POST            api/comments ....................................................................... comments.store › Api\CommentController@store  
  GET|HEAD        api/comments/{comment} ............................................................... comments.show › Api\CommentController@show  
  PUT|PATCH       api/comments/{comment} ........................................................... comments.update › Api\CommentController@update  
  DELETE          api/comments/{comment} ......................................................... comments.destroy › Api\CommentController@destroy 

  Exemplo de rota com uuid:
  http:<span class="hljs-comment">//localhost/api/comments/8379fb45-d3da-4145-a38e-15badae5541a</span>
</code></pre>
        <h2 id="route-http-localhost-api-images">Route <a
                href="http://localhost/api/images">http://localhost/api/images</a>
        </h2>
        <p>Criar/Listar/Editar/Excluir uma nova imagem para a noticia</p>
        <h4 id="vis-o-geral">Visão Geral</h4>
        <pre><code>  GET|HEAD        api/images ............................................................................. images.index › Api\ImageController@index  
  POST            api/images ............................................................................. images.store › Api\ImageController@store  
  GET|HEAD        api/images/{image} ....................................................................... images.show › Api\ImageController@show  
  PUT|PATCH       api/images/{image} ................................................................... images.update › Api\ImageController@update  
  DELETE          api/images/{image} ................................................................. images.destroy › Api\ImageController@destroy   

  Exemplo de rota com uuid:
  http:<span class="hljs-comment">//localhost/api/image/8379fb45-d3da-4145-a38e-15badae5541a</span>
</code></pre>
        <h2 id="route-http-localhost-api-trash">Route <a
                href="http://localhost/api/trash">http://localhost/api/trash</a>
        </h2>
        <p>Listar dados arquivados</p>
        <h4 id="vis-o-geral">Visão Geral</h4>
        <p>Ao deletar qualquer registro ele não será excluído do banco de dados, será arquivado e por meio desta rota é
            possível lista os registros arquivados.</p>
        <pre><code>  GET|HEAD        api/trash ............................................................................... trash.index › Api\TrashController@index  
  GET|HEAD        api/trash/{trash} ......................................................................... trash.show › Api\TrashController@show
  GET|HEAD        api/trash/{trash} ......................................................................... trash.show › Api\TrashController@show  
  PUT|PATCH       api/trash/{trash} ..................................................................... trash.update › Api\TrashController@update  
  DELETE          api/trash/{trash} ................................................................... trash.destroy › Api\TrashController@destroy 

  Exemplo da rota com o parametro ?table:
  http:<span class="hljs-comment">//localhost/api/trash?table=reports</span>
</code></pre>
        <h3 id="autor-br-">Autor <br></h3>
        <p><img src="https://github.com/wevertoncamposdev.png" width=115><br><sub>Weverton Campos</sub></p>

    </div>
</body>

</html>
