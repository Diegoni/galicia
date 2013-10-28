<?php include_once("menu.php"); ?>

<div class="span9">
<b>Si desea ver el contenido de un archivo, solo debe cargarlo</b>
<br>
<input id="fileInput" type="file" size="50" onchange="processFiles(this.files)">
<div id="fileOutput"></div>
</div>
  
