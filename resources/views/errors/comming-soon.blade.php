@extends("layouts.web")

@section("content")
<div class="wrapper">
    <h1 class="title-wrapper">Próximamente<span class="dot">.</span></h1>
    <p class="content-wrapper">Conoce en persona a nuevas personas increíbles...</p>
    <div class="iconss">
      <a href=""><i class="fa-brands fa-twitter"></i></a>
      <a href=""><i class="fa-brands fa-instagram"></i></a>
      <a href=""><i class="fa-brands fa-youtube"></i></a>
    </div>
   </div>
@endsection


<style lang="scss">
@keyframes fadeIn {
  from {top: 20%; opacity: 0;}
  to {top: 100; opacity: 1;}
  
}

@-webkit-keyframes fadeIn {
  from {top: 20%; opacity: 0;}
  to {top: 100; opacity: 1;}
  
}

.wrapper {
  /*position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);*/
  display: flex;
  align-items: center;
  justify-content: center;
  flex-flow: column nowrap;
  animation: fadeIn 1000ms ease;
  -webkit-animation: fadeIn 1000ms ease;
  background: #00091B;
  color: #fff;
  width: 100%;
  height: 100%;
}

.title-wrapper {
  font-size: 50px;
  font-family: 'Poppins', sans-serif;
  margin-bottom: 0;
  line-height: 1;
  font-weight: 700;
}

.dot {
    color: #4FEBFE;
}

.content-wrapper {
  text-align: center;
  margin: 18px;
  font-family: 'Mulish', sans-serif;
  font-weight: normal;
  
}

.iconss {
  text-align: center;
  
}

.iconss i {
  color: #00091B;
  background: #fff;
  padding: 13px;
  margin: 0 10px;
  border-radius: 50px;
  border: 2px solid #fff;
  transition: all 200ms ease;
  text-decoration: none;
  position: relative;
}

.iconss i:hover, .iconss i:active {
  color: #fff;
  background: none;
  cursor: pointer !important;
  transform: scale(1.2);
  -webkit-transform: scale(1.2);
  text-decoration: none;
  
}
</style>