<h1>Meeting Faces</h1>
<h2>O Meeting Faces é um projeto pensado para auxiliar moradores de rua a encontrarem seus familiares.</h2>
<p>O projeto foi planejado para ajudar instituições/organizações de apoio a pessoas em situaçao de rua a encontrarem os familiares de seus assistidos. De que forma? </p>
<p>A idéia é cadastrar essas pessoas em situação de rua para que estes dados fiquem disponpiveis na web, para que pessoas de qualquer lugar do mundo possam encontra-lás</p>
<h3>Nosso funcionamento:</h3>
<p>Toda aplicação desenvolvida em PHP (disponível na web), é voltada para que usuários possam pesquisar/procurar por pessoas em situação de rua, sendo disponibilizado então, uma tela que em termos técncicos, contém um SELECT *, ou seja, ela imprime todos as pessoas cadastradas no banco. Por outro lado, há um formulário, para que sejam pesquisadas informações específicas de cada pessoa, assim pode ser encontrado alguém no nosso banco com apenas uma ou duas informações inseridas no form (se o morador também ter essas informações cadastradas em seu perfil).</p>
<h4>Como rodar a aplicação:</h4>
<p>Como o projeto não foi disponibilizado via docker, abra seu terminal com o 
<a href="https://git-scm.com">GIT</a> instalado e escreva o seguinte comando 
<code>gh repo clone svitorz/meeting_faces</code>
Feito isso, dentro do seu repositório atual está todo o código fonte do projeto,
para rodar a aplicação, você precisará de um servidor local, como o <a href="https://www.apachefriends.org/pt_br/index.html">XAMPP</a> ou o <a href="https://www.wampserver.com/en/">WAMP</a>, após instalar um desses servidores, coloque a pasta do projeto dentro da pasta <code>htdocs</code> do seu servidor local, e então, inicie o servidor e acesse o projeto pelo seu navegador, digitando <code>localhost/meeting_faces</code> na barra de endereços.
Para que tudo funcione perfeitamente, abra seu Sistema gerenciador de banco de dados (de preferência usando POSTRESQL, pois é o banco utilizado no projeto) e abra o arquivo <a href="https://github.com/svitorz/meeting_faces/blob/main/SQL/MEETING_FACES.sql">MEETINGFACES.sql </a> dentro do seu SGBD, após isso, apenas execute o arquivo e pronto, tudo está pronto para rodar o projeto. 
</p>
