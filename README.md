<p align="center"><a href="https://vuejs.org/" target="_blank"><img src="../superbulous/" width="400" alt="Laravel Logo"></a></p>
<p align="center"><a href="https://inertiajs.com/" target="_blank"><img src="./images/inertia.png" width="400" alt="Laravel Logo"></a></p>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="./images/laravel.png" width="400" alt="Laravel Logo"></a></p>


## Sobre

Aqui estou usando Vue/Inertia/Laravel/Tailwind... 
Basicamente, decidi fazer uma pequena plataforma para me permitir trabalhar nas coisas com as quais tenho trabalhado. 
Então você verá aqui um aplicativo responsivo (aspecto que sou péssimo no dia a dia, mas o Tailwind ajuda muito no processo). 
Modo darkmode, o que não é grande coisa se você for um desenvolvedor experiente, mas para mim é muito, muito legal. 
Também tenho estudado Laravel por dois meses e é tão precioso o jeito que ele é estruturado. 
A arquitetura MVC é tão incrível, mas neste caso não estou usando blade como a minha engine de componentização. 
Porque descobri o Inertia. Devo confessar que ainda não sei exatamente o que é, 
mas me permitiu integrar Laravel e Vue.js, o que é ótimo. Ele lida com as routes do aplicativo, renderizando os componentes do Vue como nosso V no MVC. 
Permitindo que você faça SPAs facilmente. De qualquer forma, eu gosto. A propósito, o Vue.js é tão charmoso e 
me permite usar JS em que na minha visão todo wep app deveria ter, principalmente nesse mundo de motion web e 3d, 
a possibilidade de usar um threejs por exemplo, adobe, gsap, animar svgs, etc...

Comecei esse projeto em dezembro para treinar meus conhecimentos em laravel e vue. Antes do desafio já havia nesse uma verificação de email, porém, ela se resumia a um onclick no botão (me baseei muito na documentação do laravel). Além disso, havia apenas uma table em todo o projeto (a do Users que é default do laravel) um pouco modificada (Adicionei duas rows a ela - você poder ver nas migrations) preparando a mesma para receber funcionalidades como remember me token e email verification. Por sinal, estava usando sqlite que é default do laravel 11, porém, agora mudei no .env para mysql como você havia pedido. Uso MAMP (servidor local) e MySQLWorkbench (Um php my admin só que local). Desde que comecei o desafio percebi a necessidade da criação de uma nova table chamada email_verification com 3 rows (user_id - chave estrangeira, token - código aleátorio de seis dígitos, expires_at - timeStamp que pode alocar tempo) em que haveria uma relação belongsTo a User... ou seja, um úsuario hasOne email_verification, ainda que a row expires_at expire (Um dos critérios do desafio), caso ele reinvidique outro token de verificação, a row na tabela email_verification irá apenas realizar o update dessas duas rows (Gerando um novo token e adicionando + 10 minutos para o expires_at) caso não seja a primeira vez que o request user tenha feito tal request, por isso o uso do UpdateOrCreate() method. Após o create || update na row do user com id x, uso o Facade (Mail) e envio a mensagem para o email do úsuario baseado no email no .env. Já estou enviando diretamente para o Gmail, porém é preciso que o senhor tenha completado a verificação de dois passos no seu email google e crie uma senha para esse app na seção app passwords e mude o .env com o seu email e a senha. Após isso damos o Feeback ao usuário de que o email foi enviado com sucesso. Isso foi o send() method dentro do EmailController. Por sinal, todas as rotas do EmailController você pode achar em routes/auth.php. e toda a UI responsavel por chamar esse processo está em resources/pages/auth/VerifyEmail.vue, em Web.php você pode achar as routes que contém o middleware de verified. 


Após isso, criei o method verify, no qual o objetivo é verificar se o input token do usuário corresponde ao token enviado até ele. Ou se o token já foi expirado. Obs: Antes disso fazemos o processo de input validation (Evitando HTML injection, etc...). Caso tenha sido expirado, retornamos o feedback por meio de props e paramos imediatamente a timeline do method bem ali. caso tudo ocorra bem, alocamos o user vindo da verificação dentro de uma variável e fazemos o update da row email_verified_at para now(), salvamos o usuário e redirecionamos o usuário para a route com o name dashboard que anteriormente tinha sido bloqueada por conta do middleware. 


Nesse projeto consumo uma api que me permite ter acesso a um JSON repleto de personagens tanto da DC quanto da Marvel, ou seja, além de um processo envolvendo o searchbar, em que filtro o JSON baseado no input do usuário, claro... caso ele digite a por exemplo, haverão centenas de resultados, por isso uso as features do laravel envolvendo cache. Isso tudo você pode ver no app/services. Lá tem os endpoints, etc...

é isso, obrigado. Por sinal, para fazer o projeto rodar locamente, você precisará de um MAMP da vida, um php admin da vida, e da criação de uma conexão/table chamada superbulous (Dê uma olhada no .env, por favor)... quando for rodar, suba as migrations (Primeiro limpa o cache, esse tipo de coisa). Caso dê tudo certo até aí, verifica a versão do node e do laravel, composer, e roda php artisan serve em um terminal e um npm run dev (Para rodar os assets do projeto). Acho que é isso, valeu pela oportunidade.


## About Superbulous

Here i'm using Vue/Inertia/Laravel/Tailwind... Basically, i decided to make a small platform to allow me work out on the things i've been working with. So you'll see here a responsive application (Aspect that i'm terrible on daily basis, but Tailwind helps a lot on the process). Light and Dark mode which is not a big deal if you are a experient developer, but for me is so, so cool. Also i've been studying Laravel for two months and it's so precious the way it structured. MVC architecture is so amazing, but in this case i'm not using blade templates. Because i discovered Inertia. I must confess i still don't know what it is exactly, but allowed me to integrate Laravel and Vue.js which is great. It handles the routes from the application  rendering the vue components as our views. Allowing you to make easily SPAs. Anyway, i like it. By the way, Vue.js is so charming.

