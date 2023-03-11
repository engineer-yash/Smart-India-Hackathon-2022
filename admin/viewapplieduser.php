<?php

$con = mysqli_connect("localhost", "root", "", "dairy_management");

$data = mysqli_query($con, "select * from applied_user,user  where applied_user.user_id=user.user_id");
$row0 = mysqli_num_rows($data);
$res = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>View Applied Users</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="./css_final.css">

    <script src="./filter.js"></script>
</head>

<body>
<div class="container-xxl position-relative bg-white d-flex p-0">
    <?php
    include "sidebar/view_all_data/6.php"
    ?>
    <div class="content">
    <?php
    include "header.php"
    ?>




            <div class="container-fluid">
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-left">

                        <div class="text-center mt-4">

                                <h3>View Applied Users</h3>
                            </div>
                <table id="emp-table">
                    <thead>
                        <tr>
                            <th col-index=1>user_id
                                <select class="table-filter" onchange="filter_rows()">
                                    <option value="all"></option>
                                </select>
                            </th>
                            <th col-index=2>Scheme_name
                                <select class="table-filter" onchange="filter_rows()">
                                    <option value="all"></option>
                                </select>
                            </th>
                            <th col-index=3>User Name<select class="table-filter" onchange="filter_rows()">
                                    <option value="all"></option>
                                </select></th>
                            <th col-index=4>Mobile No.<select class="table-filter" onchange="filter_rows()">
                                    <option value="all"></option>
                                </select></th>
                            <th col-index=5>email<select class="table-filter" onchange="filter_rows()">
                                    <option value="all"></option>
                                </select></th>
                            <th col-index=6>Village<select class="table-filter" onchange="filter_rows()">
                                    <option value="all"></option>
                                </select></th>
                            <th col-index=7>Taluka
                                <select class="table-filter" onchange="filter_rows()">
                                    <option value="all"></option>
                                </select>
                            </th>
                            <th col-index=8>District
                                <select class="table-filter" onchange="filter_rows()">
                                    <option value="all"></option>
                                </select>
                            </th>
                            <th col-index=9>State
                                <select class="table-filter" onchange="filter_rows()">
                                    <option value="all"></option>
                                </select>
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($con, "select distinct * from applied_user,user  where applied_user.user_id=user.user_id");
                        $row1 = mysqli_num_rows($query);

                        while ($result1 = mysqli_fetch_assoc($query)) {
                            echo "
   <tr>
  
   <td>" . $result1['user_id'] . "</td>
   <td>" . $result1['scheme_name'] . "</td>
   <td>" . $result1['user_name'] . "</td>
   <td>" . $result1['mobile_no'] . "</td>
   <td>" . $result1['email'] . "</td>
   <td>" . $result1['village'] . "</td>
   <td>" . $result1['taluka'] . "</td>
   <td>" . $result1['district'] . "</td>
   <td>" . $result1['state'] . "</td>
   </tr>
   ";
                        }
                        ?>
                    </tbody>
                </table>
    </main>
    <script>
        window.onload = () => {
            console.log(document.querySelector("#emp-table > tbody > tr:nth-child(1) > td:nth-child(2) ").innerHTML);
        };

        getUniqueValuesFromColumn()
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#emp-table').DataTable();
        });
    </script>

</body>

</html>
<style>
    .button {
        border: none;
        color: white;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 1px 1px;
        cursor: pointer;
    }

    .button1 {
        background-color: #4CAF50;
        color: black;
        border-radius: 8px;
    }

    .button2 {
        background-color: #f44336;
        color: black;
        border-radius: 8px;
    }

    .button3 {
        background-color: #008CBA;
        color: black;
        border-radius: 8px;
    }
</style>

<?php
//include "footer.php"
?>
</body>

</html>