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
    <title>Book Name | Books</title>
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
              <li class="nav-item">
                <a class="nav-link btn btn-info text-dark ms-2" href="#">Add New Book</a>
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
          <div class="row my-5 justify-content-center">
            <div class="col-md-6 text-end px-5">
              <img src="https://m.media-amazon.com/images/I/81gU8YQxlSL._AC_UY327_QL65_.jpg" class="img-fluid" alt="" />
            </div>
            <div class="col-md-6 mt-2 px-5">
              <div class="book-name">
                <h6>Name</h6>
                <i>Book Name</i>
              </div>
              <div class="author mt-4">
                <h6>Author Name</h6>
                <i>Author Name</i>
              </div>
              <div class="book-info mt-4">
                <h6>Summary</h6>
                <i>Book Summary</i>
              </div>
              <div class="book-pages mt-4">
                <h6>Pages:</h6>
                <i>Pages Count</i>
              </div>
              <div class="createdAt mt-4">
                <h6>Created at:</h6>
                <i>Time</i>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="btns d-flex justify-content-end mx-5 p-2">
                <button type="button" class="btn btn-success">Edit</button>
                <button type="button" class="btn btn-danger ms-1">Delete</button>
              </div>
            </div>
            <div class="col-md-6">
              <div class="addBtn mx-5 p-2">
                <button type="button" class="btn btn-info text-light">Add Text</button>
                <button type="button" class="btn btn-primary">Add Section</button>
              </div>
            </div>
          </div>
        </section>
        <!-- Book Info -->
        <hr />
        <!-- Book Sections -->
        <div class="row mt-5">
          <div class="col-md-6 px-5 border-end border-secondary">
            <section>
              <h4 class="text-center">Book Sections:</h4>
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
    <!-- Footer -->
        <footer class="py-3 mt-4 border-top bg-warning">
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