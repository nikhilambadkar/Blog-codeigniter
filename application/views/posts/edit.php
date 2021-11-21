<h2><?= $title ?></h2>

<?php 
echo validation_errors();
?>

<!-- <form> -->
<?php echo form_open('posts/update'); ?>

<input type="hidden" name="id" value="<?php echo $post['id']; ?>" >

<div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $post['title']?>">

</div>
<div class="mb-3">
    <label class="form-label">Body</label>
    <textarea type="text" class="form-control"  name="body" placeholder="Add Body" ><?php echo $post['body']?></textarea>
    <script>
                        CKEDITOR.replace( 'body' );
                </script>
</div>
<div class="form-group">
    <label for="">Category</label>
    <select name="category_id" id="" class="form-control" > 
    <option value="">--SELECT CATEGORY--</option>
        <?php foreach($categories as $category): ?>
<option value="<?php echo $category['id']?>"><?php echo $category['name']; ?></option>
            <?php endforeach; ?>
    </select>
</div>

<button type="submit" class="btn btn-primary">Submit</button>
</form>