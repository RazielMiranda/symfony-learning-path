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
   
Pelas normas PSR o namespace APP aponta para a pasta src que já foi definido no composer.lock

Após descomentar a rota acima, podemos ir ao nosso ambiente e vamos ver que temos um erro, e como resolver?

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








