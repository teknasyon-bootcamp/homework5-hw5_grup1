<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
            crossorigin="anonymous"
    />
    <title>Edit Section</title>
</head>
<body class="bg-light">
<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-warning bg-warning">
    <div class="container">
        <a class="navbar-brand text-light" href="#">
            <img
                    src="https://scontent.fsof10-1.fna.fbcdn.net/v/t1.18169-9/22853144_321854368280724_921982228724781455_n.png?_nc_cat=111&ccb=1-5&_nc_sid=174925&_nc_ohc=uxiBkjhiXJ8AX__96X0&_nc_ht=scontent.fsof10-1.fna&oh=0dfcb8ee3e647bc65838d5ec98c93992&oe=6166FE4A"
                    alt=""
                    width="30"
                    height="32"
                    class="d-inline-block align-text-top"
            />
            HW5-Group1
        </a>
        <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Authors</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Header -->
<!-- Form -->
<div class="container bg-light mb-5">
    <main>
        <h5 class="text-center text-dark p-3 mt-2">Edit Section</h5>
        <hr>
        <?php
        if(isset($_GET["section"])){
            require_once '../autoloader.php';
            require_once('../class/Section.class.php');
            $book = new Section;
            $section=new Section;
            $section_id=(int) $_GET['section'];
            $section=$section->SectionFind($section_id);

            if ($section==false){
                echo  "<div class='alert alert-danger' role='alert'><h4 class='alert-heading'>Error</h4>Section id is wrong!</div>";
                die;
            }
            else{
                $book=$book->BookFind($section["book_id"]);
                $createdate=date('d.m.Y h:mA', strtotime($book['created_at']));
                echo "
                    <div class='container'>
                        <div class='card mb-12''>
                          <div class='row g-0'>
                            <div class='col-md-2'>
                              <img src='../config/images/$book[image_url]'  class='img-fluid rounded-start' alt='Book Image'>
                            </div>
                            <div class='col-md-10'>
                              <div class='card-body'>
                                <h5 class='card-title'>$book[name]</h5>
                                <p class='card-text'>Author: $book[author]</p>
                                <p class='card-text'><small class='text-muted'>Created at $createdate</small></p>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>";
            }
        }
        else{
            echo "<div class='alert alert-danger' role='alert'><h4 class='alert-heading'>Error</h4>Section id is wrong!</div>";
            die;
        }
        ?>
        <h5 class="text-center text-dark p-3 mt-2">Update Section</h5>
        <form id="createSectionForm" class="d-grid gap-2 col-6 mx-auto my-3" action="section-update.php?section=<?php echo $section_id; ?>" method="post">
            <div class="mb-2">
                <input class="form-control" id="name" type="text" placeholder="Section Name" name="name" value="<?php echo $section["name"]; ?>"/>
            </div>
            <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
            <div class="d-grid">
                <button class="btn btn-info text-light" type="submit" name="create" >Update</button>
            </div>
        </form>
    </main>
</div>
<!-- Form -->
<!-- Footer -->
<footer class="py-3 mt-4 border-top bg-warning" style="position:absolute; bottom: 0; width: 100%">
    <div class="container d-flex flex-wrap justify-content-between align-items-center">
        <p class="col-md-4 mb-0 text-muted ">© 2021 HW5-Group1</p>
        <div class="justify-content-center">
            <a href="#" class="col-md-4 link-dark text-decoration-none"
            ><img
                        src="https://scontent.fsof10-1.fna.fbcdn.net/v/t1.18169-9/22853144_321854368280724_921982228724781455_n.png?_nc_cat=111&ccb=1-5&_nc_sid=174925&_nc_ohc=uxiBkjhiXJ8AX__96X0&_nc_ht=scontent.fsof10-1.fna&oh=0dfcb8ee3e647bc65838d5ec98c93992&oe=6166FE4A"
                        alt=""
                        width="30"
                        height="32"
                /></a>
        </div>
        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="#" class="nav-link text-dark px-2 text-muted">Books</a></li>
            <li class="nav-item"><a href="#" class="nav-link text-dark px-2 text-muted">Authors</a></li>
        </ul>
    </div>
</footer>
<!-- Footer -->
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"
></script>
</body>
</html>