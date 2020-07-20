# SYMFONY

## Instalação

O symfony pode ser instalado tanto pelo composer quanto pelo instalador dele mesmo.

    Para criar um projeto completo:
    symfony new my_project_name --full

    Para criar um micro projeto:
    symfony new my_project_name

    ou

    Para criar um projeto completo:
    composer create-project symfony/website-skeleton my_project_name

    Para criar um micro projeto:
    composer create-project symfony/skeleton my_project_name

A única diferença entre esses dois comandos é o número de pacotes instalados por padrão. A opção --full instala todos os pacotes que você normalmente precisa para criar aplicativos da web, para que o tamanho da instalação seja maior.

O full traz o gerenciador de templates como o twik.

Basicamente o de micro projeto serve apenas para criar API e ela ser consumida.

startando um projeto:

    cd my-project/
    symfony server:start

#### Configurando um projeto existente do Symfony

Além de criar novos projetos Symfony, você também trabalhará em projetos já criados por outros desenvolvedores. Nesse caso, você só precisa obter o código do projeto e instalar as dependências com o Composer. Supondo que sua equipe use Git, configure seu projeto com os seguintes comandos:

    cd my-project/
    composer install

#### Instalando pacotes

    composer require logger

#### Verificando vulnerabilidades de segurança

    symfony check:security

#### Estrutura do symfony

    bin = binarios do symfony
    config = configuração de pacotes
    public = pasta publica do projeto
    src = pasta com os controller
    var = pasta que seria equivalente ao storage do laravel
    vendor = pacotes composer
    .env = arquivo de configuração de ambiente

### Personalização do framework: Symfony flex

Com o symfony podemos expandir de forma estruturada e sustentável, incrementando funcionalidades conforme a demanda do nosso projeto.

O symfony usa o symfony flex que fica escutando palavras chaves nos comandos do composer
quando essas palavras chaves aparecem, ele coloca as "receitas" em ação que são basicamente
um plugin que é adicionado no composer.lock alterando o fluxo de instalação dos pacotes.

Existem diversas receitas que podem ser encontradas em:

https://flex.symfony.com/

## Rotas

No symfony é possivel escolher como voce quer construir as suas rotas, as formas de escrever as rotas são:

- YAML
é um arquivo de configuração de fácil sintaxe, que já vem ativado com o symfony

- Annotations é o mais utilizado no symfony
Voce configura a rota através de comentarios dentro da função

- PHP
Forma clássica do PHP, atraves de classes e metodos

- XML
Uma variante do arquivo de configuração

### Rotas: YAML

Para configurar as rotas no symfony devemos ir até config e la já temos um arquivo chamado
routes.yaml que é o arquivo de rotas principais, e podemos já ver como funciona a estrutura das rotas:

    #index: -- esse primeiro parametro é o nome da rota
    #    path: / -- aqui vai ser a URL que vai bater
    #    controller: App\Controller\DefaultController::index -- aqui é o controller que vai ser chamado, 
   
Pelas normas PSR o namespace APP aponta para a pasta src que já foi definido no composer.lock. Após descomentar a rota acima, podemos ir ao nosso ambiente e ver a rota funcionando.

### Rotas: Annotations

Para utilizar a annotations no symfony, primeiro devemos instalar usando o comando

    composer require annotations

Em seguida podemos utilizar elas da seguinte forma direto no controller, primeiro se deve
adicionar o pacote ao controller

    use Symfony\Component\Routing\Annotation\Route;

para usar as anotações devemos em cima da função desejada colocar sempre em forma de comentario

    /**
    *
    */

E para terminar de configurar a rota se usa

    /**
    * @Route("/", methods={"POST", "GET"})
    */

Onde o primeiro parametro é a URL que bate, e o segundo parametro é os metodos que
se usa no formulário.

## Controllers

Basta ir ate a pasta 'src' e dentro da pasta 'Controller' criamos um arquivo de Controller que desejamos, pois, o erro é exatamente sobre isso, a rota está batendo e quando invoca o controller ele nao existe, após chegar na pasta e criar o arquivo podemos escrever algo como:


    <?php

    namespace App\Controller;

    class DefaultController
    {
        public function index()
        {
        echo "oi";
        }
    }

Com isso temos um novo erro sendo o que devemos retornar um objeto do tipo response ficando algo como:

    <?php

    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Response;

    class DefaultController
    {
        public function index()
        {
            //echo "oi";
            return new Response("Roi",200);
        }
    }

Outra forma é criarmos uam variavel e irmos manipulando o objeto com ela:


    class DefaultController
    {
        public function index()
        {
            $resp = new Response();
            $resp->setContent("Roi symfony sou o IZ mario!");
            $resp->setStatusCode(200);

            return $resp;
        }
    }


Lidando com a função de forma que a requisição receba dados via GET:

<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response; -- Adicionar pacote de response
use Symfony\Component\HttpFoundation\Request;

class DefaultController
{
    public function index(Request $req): Response  -- Adicionar o tipo para e o parametro para ficar mais tipado
    {
        $resp = new Response();
        $resp->setContent(json_encode(
            [
                "recebido" => $req->get('nome'),
                "IP" => $req->getClientIp()
            ]
        ));
        $resp->setStatusCode(200);

        return $resp;
    }
}

## CONTROLLERS: API REST

1. Dentro da pasta src/Controller/ criar uma pasta "Api"
2. Dentro dessa pasta criar o arquivo com o mesmo nome do controller
3. Escrever código da API algo como:

    <?php

    namespace App\Controller\Api;

    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\HttpFoundation\JsonResponse;

    /**
    * @Route("/api/v1", name="api_usuario_")
    */

    class UsuarioController
    {
        /**
        * @Route("/lista", methods={"GET"}, name="lista")
        */
        public function lista(): JsonResponse
        {
            return new JsonResponse(["Implementar lista na API", 404]);
        }


        /**
        * @Route("/cadastra", methods=("POST"), name="cadastra")
        */
        public function cadastra(): JsonResponse
        {
            return new JsonResponse(["Implentar cadastro na API", 404]);
        }

    }


4. Para debugar as API usamos o comando symfony debug:router dessa forma conseguimos, ver todas as rotas de API
5. No symfony conseguimos dar nomes as rotas para isso basta adicioanar o parametro name="" na rota:

    /**
     * @Route("/lista", methods={"GET"}, name="lista")
     */

6. Colocando o prefixo acima da classe se altera o nome da onde a rota está

    /**
    * @Route("/api/v1", name="api_usuario_")
    */
    class UsuarioController

Conceitos de REST:

- Não retorna tela, e nada diferente de um JSON.
- Pode se versionar a API com pastas.
- Se usa a response em JsonResponse.
- Sempre retorna um codigo de status: 200, 404, 301.
- Com as API REST deve ser possivel executar um CRUD.

## VIEWS: TWIG

É o gerenciador de template do symfony, como usar?

    composer require twig

- Vai ser adicionado uma pasta chamada templates
- e um novo arquivo yaml do twig onde se pode customizar ele

Se deve adicionar o extends na classe:

    extends AbstractController



