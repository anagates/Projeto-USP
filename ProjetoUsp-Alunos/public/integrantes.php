<?php

//Caminho ajustado para acessar o backend a partir das páginas do 
require_once __DIR__ . './config/database.php';
require_once __DIR__ . './controllers/DashboardController.php';

$database = new Database();
$db = $database->getConnection();

$metricas = new MetricasController($db);
$paginaAtual = basename($_SERVER['PHP_SELF']);

$metricas->registrarAcesso($paginaAtual); 

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Integrantes do Ecoar - USP</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="keywords" content="Ecoar USP, pesquisa qualitativa crítica, pesquisas radicalmente qualitativas, pesquisa baseada em artes, epistemologias artísticas, metodologias participativas, metodologias artísticas, pesquisa acadêmica crítica, ProMuSPP, EACH USP, Marilia Velardi, artes e ciências, pesquisa coletiva, epistemologias não hegemônicas">
<meta name="description" content="O Ecoar é um grupo de pesquisa da USP dedicado às pesquisas qualitativas críticas e às investigações baseadas em artes. Trabalha com epistemologias artísticas, metodologias participativas e perspectivas que questionam saberes hegemônicos, integrando arte, corpo e pesquisa para produzir conhecimento situado e transformador.">

    <!-- Favicon -->
    <link href="img/logousp.webp" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icones -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bibliotecas css e bootstrap -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Animacao de carregamento -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>


    
    <!-- Navbar -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar text-white-50 row gx-0 align-items-center d-none d-lg-flex">
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark py-lg-0 px-lg-5 wow fadeIn flex-nowrap" data-wow-delay="0.1s">
    
    <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
        <img src="./img/LogoECOAR.png" class="img-fluid" style="max-height: 60px;" alt="Logo do Ecoar">
    </a>

    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">

            <a href="index.html" class="nav-item nav-link ">Início</a>
            <a href="sobrenos.html" class="nav-item nav-link">Sobre Nós</a>
            <a href="integrantes.html" class="nav-item nav-link active">Integrantes</a>

            <details class="nav-item nav-link">
                <summary>Produção</summary>
                <ul>
                    <li><a href="pesquisas.html">Pesquisas</a></li>
                    <li><a href="textos.html">Textos</a></li>
                </ul>
            </details>

            <details class="nav-item nav-link">
                <summary>Eventos</summary>
                <ul>
                    <li><a href="EcoarConVIDA.html">Ecoar ConVIDA</a></li>
                    <li><a href="PrimeiraColoquiAEcoar.html">Primeira ColóquiA Ecoar</a></li>
                    <li><a href="SegundaColoquiAEcoar.html">Segunda ColóquiA Ecoar</a></li>
                </ul>
            </details>

            <a href="contato.html" class="nav-item nav-link">Contato</a>
            <a href="blog.html" class="nav-item nav-link">Blog</a>

            <div id="google_translate_element" class="d-flex align-items-center ms-3"></div>

        </div>
    </div>

</nav>

    </div>
    <!-- Navbar fim -->



    <!-- exemplo Header opcional -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Integrantes</h1>
        </div>
    </div>

    <!-- aqui vcs vao colocar o conteudo q o pessoal da usp passou -->

    <div class="container-xxl py-5">
        <div class="container">
<!-- lembtando q tem q ser fotos e textos-->

<!-- apaguem dps e so demonstrativo -->
 <h1> Nossos integrantes</h1>
 <br><br><br>

 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean blandit massa eu nisl ultricies, rhoncus tristique mi efficitur. Proin aliquam fermentum enim. Vivamus tempus felis augue, quis iaculis neque cursus id. Nam non elementum odio. In hac habitasse platea dictumst. Integer sed tincidunt libero, ac tincidunt arcu. Morbi vel massa orci.

Nullam at aliquam turpis, ut pulvinar risus. Nullam pharetra odio nisi, sed consequat enim aliquet vitae. Sed vehicula nibh fermentum mi blandit cursus. Morbi ut odio varius, suscipit ligula vel, tincidunt magna. Donec facilisis viverra urna eget laoreet. Aliquam commodo sit amet odio cursus ullamcorper. Mauris eu justo et orci tincidunt congue. Sed sed sem in urna facilisis rutrum in ut dui. Suspendisse bibendum ex in ultricies efficitur. Praesent lacinia et nisi ac cursus. Integer quis facilisis justo. Vestibulum convallis dolor mi, in tristique nisi bibendum a. Ut nec nibh nisl. Quisque vel odio est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In hac habitasse platea dictumst.

Fusce vitae molestie erat. Donec sodales lobortis posuere. Ut pellentesque ligula at nunc vestibulum convallis. Vestibulum tincidunt interdum lorem, at posuere orci gravida eget. Suspendisse volutpat diam justo, non pharetra ipsum tincidunt vel. Donec sodales diam vitae sem blandit rutrum. Curabitur eu tortor leo. Cras sit amet vulputate libero. Donec ornare justo eget fringilla porttitor. Curabitur sed bibendum est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce quis orci non nulla convallis congue id fringilla ipsum. Phasellus massa neque, congue nec hendrerit nec, sollicitudin vel augue. Pellentesque finibus pretium elit eget eleifend.

Maecenas ornare commodo est, sit amet congue nunc gravida vitae. Pellentesque mollis eros urna, quis condimentum elit sollicitudin ac. Nullam sed faucibus metus. Mauris in rutrum eros. Maecenas viverra tortor non nulla iaculis convallis. Etiam vestibulum pellentesque odio, vel dapibus neque vulputate in. Praesent convallis mi sed eros auctor, ac tempus elit consequat. Integer viverra, ex et consectetur elementum, urna eros tincidunt magna, at luctus urna mauris cursus augue. Duis molestie leo non auctor vehicula.

Suspendisse sed massa ut diam placerat commodo. Etiam placerat diam non dui malesuada accumsan. Maecenas aliquam mauris enim. Maecenas imperdiet lacinia dui, quis fermentum quam imperdiet aliquet. Aenean lectus velit, sollicitudin a justo vitae, accumsan fermentum quam. Suspendisse potenti. Aenean turpis erat, efficitur id pharetra non, interdum et sem. Phasellus ut turpis ut metus suscipit pretium. Nunc lobortis est sed nibh tristique pulvinar. Nunc nec sollicitudin leo, non gravida lacus.</p>

 <!--  -->
        </div>
    </div>


      <!-- Comeco do Footer -->
 
    <!-- vlibras -->
     <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
 
 
    <!-- conteudo -->
    <div class="container-fluid bg-dark text-white-50 footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
<div class="col-md-8 text-center">
  <img src="./img/LogoECOAR.png" class="img-fluid" alt="Logo do Ecoar">
</div>
                    <p><br>Grupo ECOAR – Estudos em Corpo e Arte <br><br>
<a href="https://www5.each.usp.br">EACH – Escola de Artes, Ciências e Humanidades da Universidade de São Paulo.</a></p>
 
<!-- redes sociais do projeto -->
                    <div class="d-flex pt-2">
                        <a class="btn btn-square me-1" href="https://www.facebook.com/pesquisaqualiemcena"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square me-1" href="https://www.youtube.com/@ecoarusp5628"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square me-0" href="https://www.instagram.com/ecoar.usp/"><i class="fab fa-instagram"></i></a>
                    </div>
 
 
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Endereço</h5>
                    <p><i class="fa fa-map-marker-alt me-3"></i>Av. Arlindo Béttio, 1000 – Ermelino Matarazzo, São Paulo – SP</p>
                    <p><i class="fa fa-envelope me-3"></i>ecoar.usp@gmail.com</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Acesso Rápido</h5>
                    <a class="btn btn-link" href="">Início</a>
                    <a class="btn btn-link" href="">Sobre Nós</a>
                    <a class="btn btn-link" href="">Integrantes</a>
                    <details  class="nav-item nav-link">
    <summary>Produção</summary>
    <ul>
      <li><a href="pesquisas.html">Pesquisas</a></li>
      <li><a href="textos.html">Textos</a></li>
       
    </ul>
  </details>
                    <details  class="nav-item nav-link">
    <summary>Eventos</summary>
    <ul>
      <li><a href="EcoarConVIDA.html">Ecoar ConVIDA</a></li>
      <li><a href="PrimeiraColoquiAEcoar.html">Primeira ColóquiA Ecoar</a></li>
      <li><a href="SegundaColoquiAEcoar.html">Segunda ColóquiA Ecoar</a></li>
    </ul>
  </details>
                    <a class="btn btn-link" href="contato.html">Contato</a>
                    <a class="btn btn-link" href="blog.html">Blog</a>
                    <a class="btn btn-link" href="politicaprivacidade.html">Política de Privacidade</a>
                </div>
                <div class="col-lg-3 col-md-6">
<h5 class="text-light mb-4">Newsletter</h5>
<p>Inscreva-se em nossa Newsletter e acompanhe nossos projetos.</p>
 
    <form id="newsletterForm" class="position-relative mx-auto" style="max-width: 400px;">
<input id="emailInput" class="form-control bg-transparent w-100 py-3 ps-4 pe-5"
               type="email" placeholder="Email" required>
<button type="submit"
            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">
            Inscrever
</button>
</form>
 
    <small id="msgRetorno" class="text-white mt-2 d-block"></small>
</div>
            </div>
        </div>
 
    </div>
        <!-- parte de baixo do footer com as imagens da usp -->
 
        <div class="container text-center">
  <div class="row justify-content-center align-items-center g-3">
 
    <div class="col-md-2">
      <img src="./img/LogoUSP.jpg" class="img-thumbnail" alt="Logo da USP">
    </div>
 
    <div class="col-md-2">
      <img src="./img/LogoEACH.png" class="img-thumbnail" alt="Logo da EACH">
    </div>
 
    <div class="col-md-2">
      <img src="./img/LogoProMuSPP.png" class="img-thumbnail" alt="Logo da ProMuSPP">
    </div>
 
    <div class="col-md-2">
      <img src="./img/LogoCNPq.jpg" class="img-thumbnail" alt="Logo do CNPq">
    </div>
 
    <div class="col-md-1">
      <img src="./img/LogoCAPESP.png" class="img-thumbnail" alt="Logo da CAPES">
    </div>
 
    <div class="col-md-2">
      <img src="./img/LogoFAPESP.png" class="img-thumbnail" alt="Logo da FAPESP">
    </div>
 
  </div>
</div>
 
    <!-- Final do footer -->
 
    <!-- Bibliotecas JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/parallax/parallax.min.js"></script>
    <script src="js/main.js"></script>
 
    <!-- google tradutor -->
     <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement(
    {
      pageLanguage: 'pt-br',      
      includedLanguages: 'en,pt,es,fr,de',  // idiomas que você quer permitir
      autoDisplay: true
    },
    'google_translate_element'
  );
}
</script>
 
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
 
 <!-- JS do form da newsletter -->
<script>
document.getElementById("newsletterForm")?.addEventListener("submit", async function(e) {
    e.preventDefault();
 
    const email = document.getElementById("emailInput").value;
 
    // dados para o backend
    const formData = new FormData();
    formData.append("email", email);
    formData.append("pagina", window.location.pathname);
 
    const resp = await fetch("/backend/public/salvar_email.php", {
        method: "POST",
        body: formData
    });
 
    const texto = await resp.text();
    document.getElementById("msgRetorno").textContent = texto;
});
</script>
 
 
</body>
 
</html>