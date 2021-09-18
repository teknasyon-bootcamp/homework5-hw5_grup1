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
    <title>Book Page</title>
  </head>
  <body class="bg-light">
      <!-- Header -->
      <nav class="navbar navbar-expand-lg navbar-warning bg-warning">
        <div class="container">
          <a class="navbar-brand text-light" href="index.php">
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
                <a class="nav-link text-dark" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-info text-dark ms-2" href="book-create.php">Add New Book</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Header -->
    <div class="container bg-light mb-5">
      <main>
        <!-- Book Info -->
        <section>

              <?php
              require ("../autoloader.php");
              require ("../class/Book.class.php");
              if(isset($_GET["id"])) {
                  $book = new Book;
                  $book_id = (int)$_GET["id"];
                  $book = $book->BookFind($book_id);

                  if (!$book) {
                      echo "<div class='alert alert-danger mt-5' role='alert'><h4 class='alert-heading'>Error</h4>Book id is wrong!</div>";
                      die();
                  } else {
                      $createdate = date('d.m.Y h:mA', strtotime($book["created_at"]));
                      echo "
<div class='row my-5 justify-content-center'>
              <div class='col-md-6 text-end px-5'>
                  <img src='../config/images/$book[image_url]' class='img-fluid' alt='' />
            </div>
            <div class='col-md-6 mt-2 px-5'>
              <div class='book-name'>
                <h6>Name</h6>
                <i>$book[name]</i>
              </div>
              <div class='author mt-4'>
                <h6>Author Name</h6>
                <i>$book[author]</i>
              </div>
              <div class='book-info mt-4'>
                <h6>Summary</h6>
                <i>$book[summary]</i>
              </div>
              <div class='book-pages mt-4'>
                <h6>Pages:</h6>
                <i>$book[page_count]</i>
              </div>
              <div class='createdAt mt-4'>
                <h6>Created at:</h6>
                <i>$createdate</i>
              </div>
            </div>
          </div>
          <div class='row'>
            <div class='col-md-6'>
              <div class='btns d-flex justify-content-end mx-5 p-2'>
                <a type='button' href='book-edit.php?id=$book_id' class='btn btn-success'>Book Edit</a>
                <a type='button' href='book-delete.php?id=$book_id' class='btn btn-danger ms-1'>Book Delete</a>
              </div>
            </div>
            <div class='col-md-6'>
              <div class='addBtn mx-5 p-2'>
                <a type='button' href='section-create.php?book=$book_id' class='btn btn-info text-light'>Add Text</a>
                <a type='button' href='post-create.php?book=$book_id' class='btn btn-primary'>Add Section</a>
                  ";
                  }
              }
              else{
                  echo  "<div class='alert alert-danger mt-5' role='alert'><h4 class='alert-heading'>Error</h4>Book id is wrong!</div>";
                  die();
              }
              ?>


              </div>
            </div>
          </div>
        </section>
        <!-- Book Info -->
        <hr />
        <!-- Book Sections -->
        <div class="row mt-5">
          <div class="col-md-12 px-5">
            <section>
              <h4 class="text-center">Book Sections:</h4>

                <?php
                    require ("../class/Section.class.php");
                    $section=new Section;
                    $array=["book_id"];
                    $section=$section->FindAll(["book_id"=>$book_id]);
                    var_dump($section["name"]);
                ?>
                <h5 class="card-title">Section Name
                    <button type="button" class="btn btn-success">Section Edit</button>
                    <button type="button" class="btn btn-danger">Section Delete</button>
                    <button type="button" class="btn btn-info">Add Post</button>
                </h5>

                <hr>
                <div class="card-text" style="border:1px solid gray ; border-radius:10px; padding: 15px;">
                    <p class="card-text"><strong>Post Info:</strong>Author,Created at</p>
                    <span>Lorem ipsum doitecto, quos.</span>
                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, quisquam!</span>                   </span>
                    <p class="mt-3">
                        <button type="button" class="btn btn-success">Post Edit</button>
                        <button type="button" class="btn btn-danger">Post Delete</button>
                    </p>
                </div>


                <hr>

              <div class="card text-center mt-5">
                <div class="card-header bg-secondary text-light">ID</div>
                <div class="card-body">

                  <div class="btns mt-5">
                    <button type="button" class="btn btn-success">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                  </div>
                  <div class="addText mt-3">
                    <button type="button" class="btn btn-info text-light">Add Text</button>
                  </div>
                </div>
                <div class="card-footer text-light bg-secondary">Created at: 2 days ago</div>
              </div>
              <div class="card text-center mt-5">
                <div class="card-header bg-secondary text-light">ID</div>
                <div class="card-body">
                  <h5 class="card-title">Section Name</h5>
                  <p class="card-text">Section Content (Post)</p>
                  <div class="btns mt-5">
                    <button type="button" class="btn btn-success">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                  </div>
                  <div class="addText mt-3">
                    <button type="button" class="btn btn-info text-light">Add Text</button>
                  </div>
                </div>
                <div class="card-footer text-light bg-secondary">Created at: 4 days ago</div>
              </div>
              <div class="card text-center mt-5">
                <div class="card-header bg-secondary text-light">ID</div>
                <div class="card-body">
                  <h5 class="card-title">Section Name</h5>
                  <p class="card-text">Section Content (Post)</p>
                  <div class="btns mt-5">
                    <button type="button" class="btn btn-success">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                  </div>
                  <div class="addText mt-3">
                    <button type="button" class="btn btn-info text-light">Add Text</button>
                  </div>
                </div>
                <div class="card-footer text-light bg-secondary">Created at: 7 days ago</div>
              </div>
            </section>
            <!-- Book Sections -->
          </div>
          <!-- Posts Sections-->
          <div class="col-md-6 px-5 border-start border-secondary">
            <section>
              <h4 class="text-center">Book Posts:</h4>
              <div class="card text-center mt-5">
                <div class="card-header bg-secondary text-light">ID</div>
                <div class="card-body">
                  <h5 class="card-title">Post Author</h5>
                  <p class="card-text">Post Content</p>
                  <p class="card-text">From Section: (Section Name)</p>
                  <div class="btns mt-5">
                    <button type="button" class="btn btn-success">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                  </div>
                </div>
                <div class="card-footer text-light bg-secondary">Created at: 2 days ago</div>
              </div>
              <div class="card text-center mt-5">
                <div class="card-header bg-secondary text-light">ID</div>
                <div class="card-body">
                  <h5 class="card-title">Post Author</h5>
                  <p class="card-text">Post Content</p>
                  <p class="card-text">From Section: (Section Name)</p>
                  <div class="btns mt-5">
                    <button type="button" class="btn btn-success">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                  </div>
                </div>
                <div class="card-footer text-light bg-secondary">Created at: 4 days ago</div>
              </div>
              <div class="card text-center mt-5">
                <div class="card-header bg-secondary text-light">ID</div>
                <div class="card-body">
                  <h5 class="card-title">Post Author</h5>
                  <p class="card-text">Post content</p>
                  <p class="card-text">From Section: (Section Name)</p>
                  <div class="btns mt-5">
                    <button type="button" class="btn btn-success">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                  </div>
                </div>
                <div class="card-footer text-light bg-secondary">Created at: 7 days ago</div>
              </div>
            </section>
            <!-- Posts Sections-->
          </div>
        </div>
      </main>
    </div>

<?php include ("footer.php"); ?>