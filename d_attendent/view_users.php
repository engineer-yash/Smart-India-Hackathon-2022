			<?php

			$con = mysqli_connect("localhost", "root", "", "dairy_management");
			session_start();

			?>

			<head>
				<link rel="preconnect" href="https://fonts.gstatic.com">
				<link rel="shortcut icon" href="img/icons/favicon.png" />
				<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
				<link rel="canonical" href="https://demo-basic.adminkit.io/" />

				<title>All Users Data</title>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
				<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
				<meta name="author" content="AdminKit">
				<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
				<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

				<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
				<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
				<link href="css/app.css" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

			</head>

			<body>
				<?php
				include "sidebar/view_all_users.php"
				?>
				<?php
				include "header.php"
				?>


				<main class="d-flex w-100">
					<div class="container d-flex flex-column">




						</head>

						<body>

							<table id="table_id" class="display">
								<thead>
									<tr>

										<th>User ID</th>
										<th>User Name</th>
										<th>Mobile no</th>
										<th>Email</th>
										<th>Village</th>
										<th>Taluka</th>
										<th>District</th>
										<th>State</th>
										<th>Operations</th>
									</tr>
								</thead>
								<tbody>
									<?php

									$user_id = $_SESSION['user_id'];
									$data = mysqli_query($con, "select dairy_id from dairy_owner where user_id='$user_id'");
									$row0 = mysqli_num_rows($data);

									$res = mysqli_fetch_assoc($data);
									$dairy_id = $res["dairy_id"];
									$query = mysqli_query($con, "select * from dairy_user,user where dairy_user.dairy_id='$dairy_id' and user.user_id=dairy_user.user_id ");
									$row1 = mysqli_num_rows($query);

									while ($result1 = mysqli_fetch_assoc($query)) {
										echo "
			   <tr>
			   <td>" . $result1['user_id'] . "</td>
			   <td>" . $result1['user_name'] . "</td>
			   <td>" . $result1['mobile_no'] . "</td>
			   <td>" . $result1['email'] . "</td>
			   <td>" . $result1['village'] . "</td>
			   <td>" . $result1['taluka'] . "</td>
			   <td>" . $result1['district'] . "</td>
			   <td>" . $result1['state'] . "</td>
			   <td><a href='edit.php ? uid=$result1[user_id]' class='button button1'>Edit</a>
			   <a href='deleteuser.php ? uid1=$result1[user_id]' onclick='returncheckdelete()' class='button button2'>Delete</a>
			   <a href='view_animal.php ? uid=$result1[user_id]' class='button button3'>View Animal</a></td>
			   </tr>
			   ";
									}
									?>
								</tbody>
							</table>
				</main>
				<script type="text/javascript">
					$(document).ready(function() {
						$('#table_id').DataTable();
					});
				</script>

			</body>

			</html>
			<style>
				body {
					counter-reset: my-sec-counter;
					font-family: 'Open Sans', sans-serif;
					font-size: 14px;
				}

				#DataTable {
					position: relative;
					padding: 15px;
					box-sizing: border-box;
				}

				table {
					width: 100%;
					border-collapse: collapse;
				}

				th {
					background: #0096FF;
					color: white;
					font-weight: bold;
					cursor: cell;
				}

				table th:first-child {
					border-radius: 10px 0 0 10px;
				}

				table th:last-child {
					border-radius: 0 10px 10px 0;
				}

				table td:first-child {
					border-radius: 10px 0 0 10px;
				}

				table td:last-child {
					border-radius: 0 10px 10px 0;
				}

				td,
				th {

					font-size: 12px;
					padding: 5px;
					border: 1px solid #ccc;
					text-align: left;

				}

				tr:nth-of-type(even) {
					background-color: White;
				}

				@media only screen and (max-width: 760px),
				(min-device-width: 768px) and (max-device-width: 1024px) {

					table {
						margin-top: 106px;
					}

					/* Force table to not be like tables anymore */
					table,
					thead,
					tbody,
					th,
					td,
					tr {
						display: block;
					}

					/* Hide table headers (but not display: none;, for accessibility) */
					thead tr {
						position: absolute;
						top: -9999px;
						left: -9999px;
					}

					tr {
						margin: 0 0 1rem 0;
						overflow: auto;
						border-bottom: 1px solid #ccc;
					}



					tbody tr:before {
						counter-increment: my-sec-counter;
						content: "";
						background-color: #333;
						display: block;
						height: 1px;
					}


					tr:nth-child(odd) {
						background: #ccc;
					}

					td {
						/* Behave  like a "row" */
						border: none;
						border-bottom: 1px solid #eee;
						margin-right: 0%;
						display: block;
						border-right: 1px solid #ccc;
						border-left: 1px solid #ccc;
						box-sizing: border-box;
					}

					td:before {
						/* Top/left values mimic padding */
						font-weight: bold;
						width: 50%;
						float: left;
						box-sizing: border-box;
						padding-left: 5px;
					}

					/*
	   Label the data
   You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
	   */
					td:nth-of-type(1):before {
						content: "User ID";
					}

					td:nth-of-type(2):before {
						content: "User Name";
					}

					td:nth-of-type(3):before {
						content: "Mobile No";
					}

					td:nth-of-type(4):before {
						content: "Email";
					}

					td:nth-of-type(5):before {
						content: "Village";
					}

					td:nth-of-type(6):before {
						content: "Taluka";
					}

					td:nth-of-type(7):before {
						content: "District";
					}

					td:nth-of-type(8):before {
						content: "State";
					}

					td:nth-of-type(9):before {
						content: "Operations";
					}


					.box ul.pagination {
						position: relative !important;
						bottom: auto !important;
						right: auto !important;
						display: block !important;
						width: 100%;
					}

					.box {
						text-align: center;
						position: fixed;
						width: 100%;
						background-color: #0096FF;
						top: 0px;
						left: 0px;
						padding: 15px;
						box-sizing: border-box;
						border-bottom: 1px solid #ccc;
					}

					.box ul.pagination {
						display: block;
						margin: 0px;
					}

					.box .dvrecords {
						display: block;
						margin-bottom: 10px;
					}

					.pagination>li {
						display: inline-block;
					}
				}

				.top-filters {
					font-size: 0px;
				}

				.search-field {
					text-align: right;
					margin-bottom: 5px;
				}

				.dd-number-of-recoeds {
					font-size: 12px;
				}

				.search-field,
				.dd-number-of-recoeds {
					display: inline-block;
					width: 50%;
				}

				.box ul.pagination {
					position: absolute;
					bottom: -45px;
					right: 15px;
				}

				.box .dvrecords {
					padding: 5px 0;
				}

				.box .dvrecords .records {
					margin-right: 5px;
				}
			</style>

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
			include "footer.php"
			?>
			</body>

			</html>
			<script src="js/app.js"></script>
			<script src="js/home.js"></script>