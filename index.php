<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Data Tables CSS CDN -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="jQuery.js"></script>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            color: #ffffff !important;
        }

        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.3)), url("bg-img.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .paginate_button{
            background-color: #ffffff !important;
        }
    </style>
    <title>Corona Tracker</title>
</head>

<body>
    <?php
    //API CALL
    $coronadata = file_get_contents('https://api.covid19api.com/summary');
    $data = json_decode($coronadata, true);
    // echo $data['Countries'][0]['Country'];
    // echo "<pre>";
    // print_r($coronadata);
    ?>
    <div class="container my-5">
        <h1 class="fw-bold">COVID 19</h1>
        <table class="table table-dark table-hover table-striped table-responsive text-center" id="myTable" class="display">
            <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Country</th>
                    <th scope="col">Total Confirmed</th>
                    <th scope="col">Total Recovered</th>
                    <th scope="col">Total Deaths</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($data['Countries']); $i++) {
                    echo "<tr>";
                    echo "<th>" . $data['Countries'][$i]['Date'] . "</th>";
                    echo "<th>" . $data['Countries'][$i]['Country'] . "</th>";
                    echo "<th>" . $data['Countries'][$i]['TotalConfirmed'] . "</th>";
                    echo "<th>" . $data['Countries'][$i]['TotalRecovered'] . "</th>";
                    echo "<th>" . $data['Countries'][$i]['TotalDeaths'] . "</th>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Data Tables JS CDN -->
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                paging: true,
                responsive: true
            });
        });
    </script>
    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>