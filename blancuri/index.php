<?php
include('header.php');
include('navbar.php');
include_once("db_connect.php");
?>

<title>CRDM</title>

<style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
<body>

  <div class="flex-center position-ref full-height">

    <div class="content">
      <div class="title m-b-md crdm">Centrul Republican de Diagnosticare Medicală</div>
    </div>
  </div>

  <script type="text/javascript">
    window.addEventListener('load', changeHeader);
    window.addEventListener('resize', changeHeader);
      function changeHeader() {
        if(window.innerWidth < 620) {
            document.querySelector('.crdm').innerText = 'CRDM';
            } else {
              document.querySelector('.crdm').innerText = 'Centrul Republican de Diagnosticare Medicală';
            }
          }
  </script>

</body>
