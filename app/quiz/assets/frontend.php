<!DOCTYPE html>
<html>
<head>
    <title>Quiz létrehozása</title>
    <link rel="stylesheet" href="quiz.css">
</head>
<body>
<nav>
    <div>
      <a href="#">Asztal</a>
      <a href="#">Feladattár</a>
      <a href="#">Csoportok</a>
      <a href="#">Katalógus</a>
      <a href="#">Direktcím</a>
      <a href="#">Árak</a>
    </div>
  </nav>
  <div class="zg">
  <h1>Quiz létrehozása</h1>
    <h1>Quiz létrehozása</h1>
    <form class="zg" method="post" action="quiz_feltoltese.php">
        <label for="quiz_neve">Quiz neve:</label>
        <input type="text" id="quiz_neve" name="quiz_neve" ><br><br>

        <label for="quiz_leiras">Quiz leírása:</label><br>
        <textarea  id="quiz_leiras" name="quiz_leiras" rows="10" cols="70"></textarea><br><br>

        <label for="kerdesek">Válasszon kérdéseket:</label><br>
        <select id="kerdesek" name="kerdesek[]" multiple>
        </select><br><br>
        <button onclick="myFunction()">Adatok feltöltése</button> 

        
    </form>
    <script> 
function myFunction() { 
  var x = document.getElementById("myDIV"); 
  if (x.style.display === "none") { 
    x.style.display = "block"; 
  } else { 
    x.style.display = "none"; 
  } 
} 
</script> 
</body>
</html>