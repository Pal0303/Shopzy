<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css?v=0.1">

</head>
<body>

<section class="app">
    <aside class="sidebar">
        <header>
            Menu
        </header>
        <nav class="sidebar-nav">
            <ul>
                <li>
                    <a href="#"><i class="ion-ios-medical-outline"></i> <span>&nbsp;&nbsp;&nbsp;Dashboard</span></a>
                </li>
                <li>
                    <a href="index.php?submit_cat"><i class="ion-bag"></i> <span class="">&nbsp;&nbsp;&nbsp;Insert Category</span></a>
                </li>
                <li>
                    <a href="#"><i class="ion-ios-paper-outline"></i> <span class="">&nbsp;&nbsp;&nbsp;View Category</span></a>
                </li>
                <li>
                    <a href="index.php?submit_subcat"><i class="ion-ios-navigate-outline"></i> <span class="">&nbsp;&nbsp;&nbsp;Insert Sub-Category</span></a>
                </li>
                <li>
                    <a href="#"><i class="ion-ios-paper-outline"></i> <span class="">&nbsp;&nbsp;&nbsp;View Sub-Category</span></a>
                </li>
                <li>
                    <a href="index.php?submit_prod"><i class="ion-ios-navigate-outline"></i> <span class="">&nbsp;&nbsp;&nbsp;Insert Product</span></a>
                </li>
                <li>
                    <a href="index.php?view_product"><i class="ion-ios-paper-outline"></i> <span class="">&nbsp;&nbsp;&nbsp;View Product</span></a>
                </li>

				
            </ul>

			<ul>
        <li>
            <a href="#" style="color: red;"><i class="ion-log-out"></i> <span>&nbsp;&nbsp;&nbsp;Logout</span></a>
        </li>
    </ul>

        </nav>
    </aside>



		

	<?php
	if(isset($_GET['submit_cat'])){
		include('add_category.php');
	}

	if(isset($_GET['submit_subcat'])){
		include('add_subcat.php');
	}

	if(isset($_GET['submit_prod'])){
		include('add_product.php');
	}

    if(isset($_GET['view_product'])){
		include('view_product.php');
	}

    if(isset($_GET['edit_prod'])){
		include('edit_prod.php');
	}
	
	?>