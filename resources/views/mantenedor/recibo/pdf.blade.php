$<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <style>
            .cabecera{
                background-color: black;
                color:white;
            }
            h1{
                color:brown;
            }
        </style>
    </head>

    <body>
        <img src="https://static.vecteezy.com/system/resources/previews/020/274/235/non_2x/student-icon-for-your-website-design-logo-app-ui-free-vector.jpg" alt=""width="50px" height="50px">
        <h1 class="text-center">Recibos Registrados</h1><br> 
        <body>
    <table class="table" style="text-align: center;font-size:10px">
            <thead class="cabecera">
                <tr>
                    <th scope="col">N° Recibo</th>
                    <th scope="col">Concepto</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Monto</th>
            </thead>

            <tbody>
            @foreach($recibo as $itemrecibo)
                    <tr>
                        <td>{{$itemrecibo->idRecibo}}</td>
                        <td>{{$itemrecibo->concepto}}</td>
                        <td>{{$itemrecibo->fecha}}</td>
                        <td>{{$itemrecibo->monto}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <main></main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </bod>
</html>
