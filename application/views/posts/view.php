<h2><?php echo $post['title']; ?></h2>

<small class="post-date">
    Posted on: <?php echo $post['created_at'] ?>
</small><br>
<img src="<?php echo base_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" alt="" srcset="">
<div class="post-body">

    <?php echo $post['body']; ?>
</div>

<!-- ..Edit and delete button is shown only to user who write this post... -->
<?php if ($this->session->userdata('user_id') == $post['user_id']) : ?>

    <a class="btn btn-primary pull-left" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug'] ?>">Edit </a>

    <?php echo form_open('/posts/delete/' . $post['id']); ?>
    <input type="submit" value="delete" class="btn btn-danger">
    </form>
<?php endif ?>

<hr>
<h3>Comments</h3>
<hr>
<?php if ($comments) : ?>
    <?php foreach ($comments as $comment) : ?>
        <div class="well">
            <h5> <?php echo $comment['body'] ?> [by <strong> <?php echo $comment['name'] ?> </strong>] at <?php echo $comment['created_at'] ?></h5>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <p>Be the first in comment!</p>

<?php endif; ?>
<hr>


<h3>Add Comment </h3>
<?php echo validation_errors() ?>
<?php echo form_open('comments/create/' . $post['id']); ?>
<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control">
</div>
<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control">
</div>
<div class="form-group">
    <label>Body</label>
    <textarea type="text" name="body" class="form-control"></textarea>
</div>
<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>"> <!-- this is required for validation -->

<button class="btn btn-primary" type="submit">Submit</button>