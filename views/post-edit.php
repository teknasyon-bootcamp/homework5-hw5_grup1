<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Post</title>
    <?php include ("header.php"); ?>
    <!-- Form -->
    <div class="container bg-light mb-5">
        <main>
          <h5 class="text-center text-dark p-3 mt-2">Edit Post</h5>
          <hr>
          <form id="createPostForm" class="d-grid gap-2 col-6 mx-auto my-5" action="" method="post">
            <div class="mb-2">
              <input class="form-control" id="author" type="text" placeholder="Author" name="author" value=""/>
            </div>
            <div class="mb-2">
              <textarea class="form-control" id="content" type="text" placeholder="Content" name="content" style="height: 18rem"></textarea>
            </div>
            <div class="mb-2">
              <input class="form-control" id="section" type="text" placeholder="Section Name" name="section" value=""/>                </div>
            <div class="d-grid">
              <button class="btn btn-info text-light" type="submit" name="create" >Create</button>
            </div>
          </form>
        </main>
    </div>
    <!-- Form -->
    <?php include ("footer.php"); ?>