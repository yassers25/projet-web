<?php
session_start();
include("connect.php");
?>
<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="dash_styles">
    <title>Dashboard</title>


</head>

<body class="fixed-nav sticky-footer bg-secondary" id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">

        <a class="navbar-brand" href="index.php">Dashboard</a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">

            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">

                    <a class="nav-link" href="index.php">

                        <i class="fa fa-fw fa-dashboard"></i>

                        <span class="nav-link-text">Dashboard</span>

                    </a>

                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                    <a class="nav-link" href="product.php">
                        <i class="fa fa-check-square"></i>
                        <span class="nav-link-text">Ajouter Categorie</span>
                    </a>

                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">

                    <a class="nav-link" href="register.php">

                        <i class="fa fas fa-user"></i>

                        <span class="nav-link-text">Ajouter Evenement</span>

                    </a>

                </li>

            </ul>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item">

                    <form class="form-inline my-2 my-lg-0 mr-lg-2">

                        <div class="input-group">

                            <input class="form-control" type="text" placeholder="Search for...">

                            <span class="input-group-append">

                                <button class="btn btn-primary" type="button">

                                    <i class="fa fa-search"></i>

                                </button>

                            </span>

                        </div>

                    </form>

                </li>

                <li class="nav-item">

                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">

                        <i class="fa fa-fw fa-sign-out"></i>Logout</a>

                </li>

            </ul>

        </div>

    </nav>

    <div class="table-responsive">
        <h3 style="margin-top:5rem;color:rgb(220,220,220);">Catégories</h3>
        <table class="table table-striped table-bordered " id="dataTable" width="80%" cellspacing="0"
            style="margin-top:1rem;">
            <thead>
                <tr>
                    <th class="bg-light">ID</th>
                    <th class="bg-light">Nom Categorie</th>
                    <th class="bg-light">Numero des évènments</th>
                    <th class="bg-light">Action</th>
                </tr>
            </thead>
            <?php



            $sql = "SELECT categorie.ID, categorie.label, COUNT(events.ID) AS num_events
                    FROM categorie
                    LEFT JOIN events  ON categorie.ID = events.id_categorie
                    GROUP BY categorie.ID, categorie.label";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tbody>
                        <tr>
                            <th>
                                <?php echo $row['ID']; ?>
                            </th>
                            <td>
                                <?php echo $row['label']; ?>
                            </td>
                            <td>
                                <?php echo $row['num_events']; ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <form method="post" action="delete_categorie.php">
                                <input type="hidden" name="cat_delete" value="<?php echo $row['ID']; ?>">
                                    <button type="submit" name="delete_event" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>

                            </td>


                        </tr>

                    </tbody>

                    <?php

                }
            }

            ?>

        </table>



    </div>

    <div class="table-responsive">
        <h3 style="margin-top:5rem;color:rgb(220,220,220);;">Evenements</h3>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="margin-top:1rem;">
            <thead>
                <tr>
                    <th class="bg-light">ID</th>
                    <th class="bg-light">Nom Evenement</th>
                    <th class="bg-light">Numero des participants</th>
                    <th class="bg-light">Action</th>

                </tr>
            </thead>
            <?php



            $sql = "SELECT * FROM events";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {

                // output data of each row
            
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tbody>
                        <tr>
                            <th>
                                <?php echo $row['ID']; ?>
                            </th>

                            <td>

                                <?php echo $row['NOM']; ?>

                            </td>

                            <td>

                                <?php echo 1 ?>

                            </td>
                            <td>
                                <button type="button" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <form method="post" action="delete_event.php">
                                <input type="hidden" name="event_delete" value="<?php echo $row['ID']; ?>">
                                    <button type="submit" name="delete_event" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>

                            </td>

                        </tr>

                    </tbody>

                    <?php

                }
            }
            mysqli_close($conn);

            ?>

        </table>



    </div>

</body>

</html>
