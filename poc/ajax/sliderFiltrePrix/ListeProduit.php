<!DOCTYPE html>
<html lang="FR">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">    <title></title>
    <link rel="stylesheet" href="../public/css/listeProduit.css">
    <link rel="stylesheet" href="../public/css/navBar.css">
  </head>
  <body>
    <div id="filtrePrix">
      <div>Prix minimum :&nbsp;</div>
      <div id="prixMinValue">0</div>
      <input type="range" name="" id="prixMinimum" min="0" max="100" value="0" oninput="updatePriceFilter()">
      <div>Prix maximum :&nbsp;</div>
      <div id="prixMaxValue">100</div>
      <input type="range" name="" id="prixMaximum" min="0" max="100" value="100" oninput="updatePriceFilter()">
    </div>

    <div id="listeArticles">
    </div>

  </body>
  <script>

      function updatePriceFilter() {
        var prixMin = document.getElementById("prixMinimum").value;
        var prixMax = document.getElementById("prixMaximum").value;

        
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
          if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('listeArticles').innerHTML = xhr.responseText;
          }
        };

        var url = 'scriptFiltrage.php?prixMin=' + prixMin + '&prixMax=' + prixMax;
        xhr.open('GET', url, true);
        xhr.send();

        document.getElementById("prixMinValue").innerHTML = document.getElementById("prixMinimum").value;
        document.getElementById("prixMaxValue").innerHTML = document.getElementById("prixMaximum").value;
      }
  </script>
</html>
