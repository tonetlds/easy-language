Easy Language
=============

Gerenciador de idiomas em PHP.

1. Download
--------------
##### Via git:

```
git clone https://github.com/tonetlds/easy-language

```

##### Manualmente :
* Faça o download [aqui]
* Descompacte o ZIP na pasta raíz do seu site/sistema


2. Instalação
--------------
Adicione esta linha no início do sistema, logo após a primeira *"session_start()"* :
```php
include_once( 'easy-language/easy-language.php' );
```

3. Uso
--------------
##### Alterando o idioma via GET:
Utilize requisições ***GET***, passando o idioma desejado como parâmetro ***lang***. Exemplo:


```php
meusite.com/?lang=pt_BR
```
*(Utilize o código [ISO](http://www.loc.gov/standards/iso639-5/id.php) do idioma + o código do país unidos por underline, ex: "pt_BR, en_US")*

Você pode criar links para para alternar entre os idioma:
```php
<ul>
   <li><a href="?lang=pt_BR">Português</a></li>
   <li><a href="?lang=en_US">English</a></li>
   <li><a href="?lang=es_ES">Español</a></li>
</ul>
```
O Easy-Language salva o idioma selecionado na variável ***Lang*** da sessão e utiliza a mesma como base de referência para tudo.

```php
$_SESSION['lang']

```
Cada vez que uma alteração de idioma é solicitada, o Easy-Language salva o novo código nesta variável.

```code
/* 
Requisição GET 
seusite.com/lang=en_US
*/
print_r( $_SESSION['lang'] ); // Retornará 'en_US'

```

Altere esta variável a qualquer momento e o sistema buscará pelos ***arquivos de tradução*** na pasta referênte ao idioma solicitado.

---

##### Alterando o idioma via código:
Você pode alterar a variável *lang* da sessão a qualquer momento (depois da inclusão do Easy-Language)
```php
$_SESSION['lang'] = 'pt_BR';
echo _( 'Sobre nós' );  
/** Retorna 'Sobre nós' **/

$_SESSION['lang'] = 'en_US';
echo _( 'Sobre nós' );  
/** Retorna 'About us' **/
```
---
Arquivos de tradução
------
O Easy-Language utiliza o sistema [Gettext](http://en.wikipedia.org/wiki/Gettext) para traduções.

Os arquivos com as traduções possuem o nome padrão **messages** e extensão **.po** e **.mo** e devem ficar dentro de pastas com nome ***/LC_MESSAGES*** para cada idioma utilizado.
```php
\pt_BR
    \LC_MESSAGES
        messages.mo
        messages.po
```

O arquivo **messages.po** será utilizado para fazer as traduções, gerando o arquivo **messages.mo** que será lido pelo Easy-Language.

Cada idioma deve conter uma pasta com nome idêntico ao seu código ISO, dentro da pasta ***/languages***:
```php
\easy-language
    |    easy-language.php
    |       
    \languages
        \en_US
        |   \LC_MESSAGES
        |       messages.mo
        |       messages.po
        |
        \es_ES
        |   \LC_MESSAGES
        |       messages.mo
        |       messages.po
        |
        \pt_BR
            \LC_MESSAGES
                messages.mo
                messages.po
```

---
Preparando o site para tradução
------
Todo o conteúdo do site que será traduzido deverá ser preparado antes de serem gerados os arquivos de tradução.

Cada string a ser traduzida deve seguir as regras padrão do *[GETTEXT()](http://php.net/manual/pt_BR/function.gettext.php)*.

Utilizando **get_text()**:
```code
echo gettext("Bem vindo ao meu site traduzido");
```
ou o seu alias **_( )**:
```code
echo _("Bem vindo ao meu site traduzido");
```

Exemplos:
```code
<ul>
    <li>
        <a href="#"><?php echo _('Início') ?></a>
    </li>
    <li>
        <a href="#"><?php echo _('Sobre nós') ?></a>
    </li>
    <li>
        <a href="#"><?php echo _('Contato') ?></a>
    </li>
</ul>


<h1><?php echo _('Artigo traduzido') ?></h1>
<p>
    <?php echo _('Texto do conteúdo do artigo em vários idiomas...') ?>
</p>
```
Obs.:
* Inicialmente, o texto "preparado" será a chave para o resto da tradução. Se o arquivo com a tradução do idioma solicitado não existir, ou a string não foi traduzida, esta "chave" original será exibida.
* Depois que o todo o conteúdo estiver preparado, você já pode criar os catálogos de tradução.

---
Traduzindo
------
Antes de começar a traduzir é necessário catalogar todas as strings que foram preparadas.

Em Windows, a melhor opção para esta tarefa é o aplicativo [poEdit](http://poedit.net/), que escaneia todos os arquivos em busca de "strings para traduzir", e os indexa no arquivo "messages.mo".

Baixe o poEdit e instale-o. Será necessário.

___

####1. Crie uma pasta para o novo idioma
Dentro da pasta ***/easy-language/languages*** crie uma nova pasta com nome igual ao código ISO do idioma desejado, e dentro desta crie outra pasta com nome "LC_MESSAGES".

Exemplo:

```code
mkdir "easy-language/languages/it_IT"
mkdir "easy-language/languages/it_IT/LC_MESSAGES"
```
####2. Crie um novo catálgo
* Abra o plicativo **poEdit**.
* Clique em "Arquivo > Novo" (ou CTRL + N)
* Selecione o idioma da nova tradução
* Salve o arquivo dentro da pasta "LC_MESSAGES", com o nome **messages.po** (é necessário salvar antes para que o programa consiga indexar as strings)
* Clique no menu "Catálogo > Propriedades" (ou ALT + ENTER)
* Na janela de propriedades do catálogo, digite o nome do projeto e certifique-se de informar o "Conjunto de caracteres do código-fonte". Recomenda-se **UTF-8**, porém se seus arquivos estiverem em outra codificação, como **ISO-8859** por exemplo, informe-a neste campo.
* Na guia "caminhos das fontes", adicione o caminho exato até a pasta raíz do seu site/sistema no campo "Caminhos". Exemplo:
```code
Caminhos: "C:\xampp\htdocs\meusite"
```
![alt tag](http://lucianotonet.com/assinaturas/studionamosca.png)

___
## Autor
Luciano Tonet : [@tonetlds](http://lucianotonet.com)  
___
Licença
-------

[MIT](http://opensource.org/licenses/MIT) **\o/ Free Software**

[john gruber]:http://daringfireball.net/
[@thomasfuchs]:http://twitter.com/thomasfuchs
[1]:http://daringfireball.net/projects/markdown/
[marked]:https://github.com/chjj/marked
[Ace Editor]:http://ace.ajax.org
[node.js]:http://nodejs.org
[Twitter Bootstrap]:http://twitter.github.com/bootstrap/
[keymaster.js]:https://github.com/madrobby/keymaster
[jQuery]:http://jquery.com
[@tjholowaychuk]:http://twitter.com/tjholowaychuk
[express]:http://expressjs.com
[easy-language]:https://github.com/tonetlds/easy-language
[aqui]:https://github.com/tonetlds/easy-language/archive/master.zip
[easy-language-download]:https://github.com/tonetlds/easy-language/archive/master.zip

___