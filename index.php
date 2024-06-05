<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

        <link rel="stylesheet" type="text/css" href="style.css" />
        <script type="module" src="index.js"></script>
        <script type="module" src="index.ts"></script>
        
    </head>
    <body>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <!-- Principal -->
        <div class="principal">
            <!-- Foto de la izquierda -->
            <div class="foto_principal">
                <div class="comentario_foto">
                   <!--  <img src="imagenes/1.jpg" alt=""> -->
                        <!-- Contenedor de la frase-->
                        <div class="cont_info_foto">
                            <h2 class="sueños">Invertir en ti es darle <span class="resaltar">luz</span> a tus sueños</h2>
                        </div>
                </div>
            </div>

            <!-- Info derecha -->
            <div class="cont_derecha">
                <div class="cont_titulo">
                    <h1 class="titulo">Montellano</h1>
                </div>

                <div class="cont_frase">
                    <h1 class="subtitulo"><span class="mejor">La mejor</span> <span class="inversion">inversion</span> es en ti mismo.</h1>
                </div>

                <form action="login.php">
                
                    <button class="login">Iniciar Sesion</button>

                </form>
                
                
                <div class="login">Iniciar Sesion</div>
            </div>

        </div>


        <!-- Servicios -->

        <div class="servicios">
            <div class="serv_1">
                <div class="img_serv_1">
                        <div class="cont_text_serv_1">
                            <h1>Servicio 1</h1>
                        </div>
                </div>
            </div>

            <div class="serv_2">
                <div class="img_serv_2">
                        <div class="cont_text_serv_2">
                            <h1>Servicio 2</h1>
                        </div>
                  
                </div>
            </div>

            <div class="serv_3">
                <div class="img_serv_3">
                        <div class="cont_text_serv_3">
                            <h1>Servicio 3</h1>
                        </div>
                </div>
            </div>

            <div class="serv_4">
                <div class="img_serv_4">
                        <div class="cont_text_serv_4">
                            <h1>Servicio 4</h1>
                        </div>
                </div>
            </div>

            <div class="serv_5">
                <div class="img_serv_5">
                        <div class="cont_text_serv_5">
                            <h1>Servicio 5</h1>
                        </div>
                </div>
            </div>

        </div>
     

        <!-- Instalaciones -->

        <div class="instalaciones">
            <div class="img_inst_1">
                <div class="burbuja_1">
                    <div class="cont_text_inst">
                        <h1 >Biblioteca</h1>
                    </div>
                </div>
            </div>


            <div class="img_inst_2">
                <div class="burbuja_2">
                    <div class="cont_text_inst">
                        <h1>Cafeteria</h1>
                    </div>
                </div>
            </div>

            <div class="img_inst_3">
                <div class="burbuja_3">
                    <div class="cont_text_inst">
                        <h1>Deportes</h1>
                    </div>
                </div>
            </div>

            <div class="img_inst_4">
                <div class="burbuja_4">
                    <div class="cont_text_inst">
                        <h1>Servicios</h1>
                    </div>
                </div>
            </div>

        </div>



        <div id="map"></div>

    <!-- prettier-ignore -->
    <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg", v: "weekly"});</script>
    </body>
</html>