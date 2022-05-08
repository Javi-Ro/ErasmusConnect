<template>

<div id="about-us" >
  <div class="container">
  <div class="header">
     <div class="background"></div>
     <div class="logo"></div>

  </div>
   
   <div class="about">
      <div class="left">
         <h1>Sobre el proyecto</h1>
         <hr>
         <p>Somos un joven equipo de desarrollo web con la reciente experiencia de Erasmus. Por este motivo, ese es el tema principal de la web que hemos desarrollado. El proyecto ha sido llevado a cabo en php y Vue. Además de componentes nacidos de combinar vue con Bulma CSS (Buefy).</p>

                  <p>Para conseguir los obejetivos descritos más adelante, hemos creado apartados como: un foro, perfiles de usurios, etiquetas para filtar contenido, apartado de alojamientos...</p>

      </div>
      <div class="right">
         <img src="images/about/about.png">
      </div>
      <div class="clear"></div>
   </div>
   
   
   
   <div class="mission">
     
      <div class="left">
         <img src="/images/about/friends.jpg">
      </div>
        <div class="right">
         <h1>Misión </h1>
         <hr>
         <p>Nuestro objetivo es claro: mejorar las herramientas actuales que facilitan la experiencia de un Erasmus
             siendo estudiante. Actualmente existen otras herramientas pero la mayoría muy anticuadas.
              Con Erasmus Connect pretendemos unificar todo lo que necesita un alumno erasmus a la hora de realizarlo. Desde encontar alojamiento hasta socializar con usuarios en su misma situación, pasando por elevar su experiencia en viajes con informacion proporcionada por la comunidad. </p>

                  <p></p>

      </div>
      <div class="clear"></div>
      
   </div>
   
   <h1 class="header-team"> Nuestro Equipo</h1>
  
   <div class="team">
          
      <hr>
          
      <div  class="card">
         <div class="circle-container">
            <h1 style="color:#fff;">MMM</h1>
         </div>
         <br>
         <h4>Frontend dev</h4>
      </div>
          
          
          
      <div class="card">
         <div class="circle-container">
            <h1 style="color:#fff;">ABA</h1>
         </div>
         <br>
         <h4>Backend dev</h4>
      </div>
          
          
          
      <div class="card">
         <div class="circle-container">
            <h1 style="color:#fff;">JRJ</h1>
         </div>
         <br>
         <h4>Full-stack dev</h4>
      </div>
          
          
          
      <div class="card">
        <div class="circle-container">
            <h1 style="color:#fff;">MAF</h1>
         </div>
         <br>
         <h4>Backend dev</h4>
      </div>
          
             <div class="card">
         <div class="circle-container">
            <h1 style="color:#fff;">IS</h1>
         </div>
         <br>
         <h4> Backend dev</h4>
      </div>
          
          
          
      <div class="card">
        <div class="circle-container">
            <h1 style="color:#fff;">RMR</h1>
         </div>
         <br>
         <h4> Frontend dev</h4>
      </div>

      <div class="card">
        <div class="circle-container">
            <h1 style="color:#fff;">RBM</h1>
         </div>
         <br>
         <h4> Full-stack dev</h4>
      </div>
          
          
   </div>

   </div>

   
</div>
</template>

<script>
export default {

}
</script>

<style lang="scss">

#about-us{
  margin-top:92px;
  width: 100%

}

@import url('https://fonts.googleapis.com/css?family=Roboto');
body{
   margin:0;
   padding:0;
   font-family: 'Roboto', sans-serif;
   position:relative;
}
nav{
   width:100%;
   height:100px;
   background-color:rgba(51, 51, 51, 0.3);
   position:absolute;
   top:0;
   z-index:5;
}
.header{
   width:100%;
   height:500px;
     

   .background{
      position: absolute;

   width:100%;
   height:500px;

      opacity:.3;

   filter: blur(1px);
      background-color:#00309a;
   background-image:url('~@../../../public/images/about/AboutHead.png');
   
   background-size:cover;
   background-position:bottom;

   }

   .logo{
      width:100%;
      position: absolute;
      z-index: 2;

      height:500px;
      background-image:url('~@../../../public/images/logo/logo.png');
      background-size: auto;
      background-repeat: no-repeat;
      background-position: center   ;
      
   }
}

.container{
   width:100%;
}
.container h1{
   font-size:70px
}
.about{
   padding:5% 0;
   width:100%;
   height:auto;
   background-color:#fff;
}
.about .left{
   padding:2% 0;
   float:left;
   width:50%;
   display:inline-block;
}
.about .right{
   width:50%;
   display:inline-block;
}
.about .right img{
   width:100%
}
.about .left h1{
   text-align:center;
   color:#00309a;
   margin:0 0 10px 0;
}
.about .left hr{
   width:20%;
   border-top:2px solid #000;
   border-bottom:none;
}
.about .left p{
   font-size:20px;
   margin:40px auto;
   width:80%
}

.mission{
   padding:5% 0;
   width:100%;
   height:auto;
   background-color:#fff;
}
.mission .right{
   padding:2% 0;
   width:50%;

   display:inline-block;
}
.mission .left{
   float:left;
   width:50%;

   display:inline-block;
}
.mission .left img{
   width:100%;
}
.mission .right h1{
   text-align:center;
   color:#00309a;
   margin:0 0 20px 0;
}
.mission .right hr{
   width:35%;
   border-top:2px solid #000;
   border-bottom:none;
}
.mission .right p{
   font-size:20px;
   margin:40px auto;
   width:80%
}


.team{
   display: flex;
   flex-wrap: wrap;
   width:100%;
   margin:auto;
   background-color:#fff;
   justify-content: center;
}
.team hr{
   margin-left: 33%;
   width:100%;

}
.header-team{
   color:#00309a;
   background-color:#fff;
   text-align: center;
   
}
.team .card{
   padding-bottom:20px;
   padding-top:20px;
   position:relative;
   min-width:20%;
   height:380px !important;
   height:auto;
   background-color:#fff;
   display:inline-block;
   margin:40px 6.5%;
   box-shadow: 0 0 20px 2px rgba(0,0,0,0.5);
   text-align:center;
}
.card .circle-container{
   position:relative;
   background-color:#00309a;
   width:250px;
   height:250px;
   border:none;
   border-radius:50%;
   margin:auto;
   color:#fff;
}
.circle-container h1{
   position:absolute;
   top:50%;
   left:50%;
   transform:translate(-50%,-50%);
   margin:0;
   font-size:60px;
}

.team .card h4{
   text-align:center;
   margin:10px 0 0 0;
   color:#00309a;
   font-size:30px;
}
.clear{
    clear: both;			
}











@media(max-width:992px){
   .about .left{
   width:100%; 
}
   .about .right{
   width:100%; 
}
      .mission .left{
   width:100%; 
}
   .mission .right{
   width:100%; 
}
   .team .card{ 
   width:40%;
}   
}

@media(max-width:768px){
      .team .card{ 
   width:100%;
} 
   nav{
      height:80px;
   }
}


</style>