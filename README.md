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

## Personalização do framework

Com o symfony podemos expandir de forma estruturada e sustentável, incrementando funcionalidades conforme a demanda do nosso projeto.

