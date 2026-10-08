<?php
require('../include/top.inc.php');
isAdmin();

$title='';
$short_description='';
$image='';
$image_alt_tag='';
$description='';
$url='';
$meta_title='';
$meta_desc='';
$meta_keyword='';
$image_required='required';

if(isset($_GET['id']) && $_GET['id']!=''){
    $id=get_safe_value($con,$_GET['id']);
    $image_required='';

    $res=mysqli_query($con,"SELECT * FROM destinations WHERE id='$id'");
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);

        $title=$row['title'];
        $short_description=$row['short_description'];
        $image=$row['image'];
        $image_alt_tag=$row['image_alt_tag'];
        $description=$row['description'];
        $url=$row['url'];
        $meta_title=$row['meta_title'];
        $meta_desc=$row['meta_desc'];
        $meta_keyword=$row['meta_keyword'];
    }
}

if(isset($_POST['submit'])){
    $title=get_safe_value($con,$_POST['title']);
    $short_description=get_safe_value($con,$_POST['short_description']);
    $image_alt_tag=get_safe_value($con,$_POST['image_alt_tag']);
    $description=get_safe_value($con,$_POST['description']);
    $url=get_safe_value($con,$_POST['url']);
    $meta_title=get_safe_value($con,$_POST['meta_title']);
    $meta_desc=get_safe_value($con,$_POST['meta_desc']);
    $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);

    if(!empty($_FILES['image']['name'])){
        $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],"../../uploads/destination/".$image);
    }

    if(isset($_GET['id']) && $_GET['id']!=''){
        mysqli_query($con,"
            UPDATE destinations SET
            title='$title',
            short_description='$short_description',
            image='$image',
            image_alt_tag='$image_alt_tag',
            description='$description',
            url='$url',
            meta_title='$meta_title',
            meta_desc='$meta_desc',
            meta_keyword='$meta_keyword'
            WHERE id='$id'
        ");
    } else {
        mysqli_query($con,"
            INSERT INTO destinations
            (title,short_description,image,image_alt_tag,description,url,meta_title,meta_desc,meta_keyword)
            VALUES
            ('$title','$short_description','$image','$image_alt_tag','$description','$url','$meta_title','$meta_desc','$meta_keyword')
        ");
    }

    header('location:manage_destination.php');
    die();
}
?>

<?php include("../include/head.inc.php"); ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Destination</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Destination
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
        <div class="row">
        <div class="col-md-8 m-auto bg-white">
    <div class="card">
        <div class="card-header">Destination Form</div>

        <form method="post" enctype="multipart/form-data">
            <div class="card-body">

                <div class="form-group">
                    <label>Destination Title</label>
                    <input type="text" name="title" class="form-control" required value="<?php echo $title; ?>">
                </div>

                <div class="form-group">
                    <label>Short Description</label>
                    <input type="text" name="short_description" class="form-control" required value="<?php echo $short_description; ?>">
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" <?php echo $image_required; ?>>
                </div>

                <div class="form-group">
                    <label>Image Alt Tag</label>
                    <input type="text" name="image_alt_tag" class="form-control" value="<?php echo $image_alt_tag; ?>">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" id="editor1" class="form-control"><?php echo $description; ?></textarea>
                </div>

                <div class="form-group">
                    <label>URL</label>
                    <input type="text" name="url" class="form-control" required value="<?php echo $url; ?>">
                </div>

                <div class="form-group">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="<?php echo $meta_title; ?>">
                </div>

                <div class="form-group">
                    <label>Meta Description</label>
                    <input type="text" name="meta_desc" class="form-control" value="<?php echo $meta_desc; ?>">
                </div>

                <div class="form-group">
                    <label>Meta Keyword</label>
                    <input type="text" name="meta_keyword" class="form-control" value="<?php echo $meta_keyword; ?>">
                </div>

                <button type="submit" name="submit" class="btn btn-info">Submit</button>

            </div>
        </form>
    </div>
</div>
</div>
</div>

<script src="../ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replace('editor1');
</script>