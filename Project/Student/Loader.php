<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript">
  function preventBack() { window.history.forward(); }
  setTimeout("preventBack()", 0);
  window.onunload = function () { null };
</script>
<style>


#loader {
  background-color: rgb(255, 255, 255);
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #b9b9b9;
  border-radius: 50%;
  border-top: 16px solid #127cc3;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
</style>
</head>
<body onload="myFunction()" style="margin:0;" >
<center><h1> Processing Payment....</h1></center>
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">
  <h2>Tada!</h2>
  <p></p>
</div>

<script>
      var myVar;
      function myFunction() {
      window.setTimeout(function() {
      window.location = 'Success.php';
      }, 5000);
      }
function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>

</body>
</html>