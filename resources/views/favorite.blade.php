<html>
    <head>
        <link rel='stylesheet' href='style/favorite.css'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@600&family=BIZ+UDPGothic&family=Open+Sans:wght@300&family=Smooch&display=swap" rel="stylesheet">
        <script src='./scripts/favorite.js' defer='true'></script>
        <script type="text/javascript">
            const CSRF_TOKEN = '{{ csrf_token() }}'; //per poter fare funzionare l header del csrf quando faccio le richieste post da js..la funzione csrf_token() funziona solo su php ..piuttosto che aggiungere dinamicamente un campo hidden con csrf con create element
        </script>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Crypto News-Preferiti</title>
    </head>
    <body>
    <header>
        <a href="{{route('home')}}">Home</a>
        <div> {{ $user }} qui puoi trovare i tuoi articoli preferiti <div>
    </header>
    <section id="news">
    </section>
    <footer>
          <div id="foot1">
            Powered by Andrea Antonino Maugeri 1000004687
          </div>
          <div id="foot2">
            Powered by Andrea Antonino Maugeri</br> 1000004687
          </div>
    </footer>
    </body>
</html>