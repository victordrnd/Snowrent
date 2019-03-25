<?php
$root = '/partages/priv/btsdcg/info1/v.durand/public_html';
include $root.'/includes/header.php';
?>
<body>
  <div class="container">
    <div class="card border-0 rounded">
      <h1 class="display-1 text-center">Erreur 404</h1>
      <img src="404.svg" class="h-75"/>
      <blockquote class="blockquote shadow-small p-5 text-center">
        <p class="mb-0">Le problème se situe toujours entre la chaise et le clavier</p>
        <footer class="blockquote-footer">Un professeur de physique</footer>
      </blockquote>
      <a href="<?=ROOTDIR?>" class="text-center text-dark "><i data-feather="chevron-left"></i> Retour à l'accueil</p>
    </div>
  </div>
</body>
<style>
.monkey-contain {
  max-width: 1200px;
  margin:0 auto;
}

/** BACK HAND TYPING **/
@keyframes backmiddletype {
  0% {transform: translateY(0px);}
  50% {transform: translateY(5px);}
  100% {transform: translateY(0px);}
}
@keyframes backpointertype {
  0% {transform: translateY(0px);}
  50% {transform: translateY(5px);}
  100% {transform: translateY(0px);}
}
@keyframes backthumbtype {
  0% {transform: translateY(0px);}
  50% {transform: translateY(-2px);}
  100% {transform: translateY(0px);}
}
.st13 {
  animation: backmiddletype .4s linear infinite;
}
.st15 {
  animation: backpointertype .5s linear infinite;
}
.st16 {
  animation: backthumbtype .6s ease infinite;
}

/** FRONT HAND TYPING **/
@keyframes frontpinkytype {
  0% {transform: rotateY(0deg);}
  50% {transform: rotateY(6deg);}
  100% {transform: rotateY(0deg);}
}
@keyframes frontringtype {
  0% {transform: translateY(0px);}
  50% {transform: translateY(-2px);}
  100% {transform: translateY(0px);}
}
@keyframes frontmiddletype {
  0% {transform: rotateY(0deg);}
  50% {transform: rotateY(-5deg);}
  100% {transform: rotateeY(0deg);}
}
.st32 {animation: frontpinkytype .6s ease infinite;}
.st34 {animation: frontringtype .6s ease infinite;}
.st33 {animation: frontmiddletype .5s ease infinite;}

/** ARMS **/
@keyframes armmove {
  0% {transform: translateY(0px);}
  50% {transform: translateY(-2px);}
  100% {transform: translateY (0px);}
}
.st31, .st30 {animation: armmove 1s ease infinite;}
@keyframes backarmmove {
  0% {transform: translateY(0px);}
  50% {transform: translateY(2px);}
  100% {transform: translateY (0px);}
}
.st17 {animation: backarmmove 1s ease infinite;}

/** BLINK **/
@keyframes blink {
  0% {opacity: 1}
  95% {opacity:1}
  97% {opacity:0}
  100% {opacity:0}
}
.st28, .st29 {animation: blink 3.5s infinite;}

/** BREATHE **/
@keyframes breathe {
  0% {transform: scale(1,1);}
  50% {transform: scale(1.010,1);}
  100% {transform: scale(1,1);}
}
.st18 {animation: breathe 4s ease infinite;}
@keyframes headmove {
  0% {transform: translateY(0);}
  50% {transform: translateY(6px);}
  100% {transform: translateY(0);}
}
.st23, .st24, .st25, .st26, .st27, .st22 {animation: headmove 4s ease infinite;}
#Eyes {animation: headmove 4s ease infinite;}
/** TAIL **/
@keyframes tailswish {
  0% {transform: skewX(0);}
  20% {transform: skewX(1deg);}
  50% {transform: skewX(1deg);}
  80% {transform:skewX(0);}
  100% {transform: skewX(0);}
}
.st12 {animation: tailswish 3s linear infinite;}
</style>
<?php
include $root.'/includes/footer/footer.php';
?>
