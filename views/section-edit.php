<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Section</title>
    <?php include ("header.php"); ?>
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
<?php include ("footer.php"); ?>