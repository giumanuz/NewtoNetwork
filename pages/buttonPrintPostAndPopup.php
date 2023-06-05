<!-- Create trigger modal -->
<div class="modal fade" id="modalPost" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                                <span class="material-symbols-outlined" style="margin-right:1rem;">
                                    edit_square
                                </span>
                <h1 class="modal-title fs-5" id="exampleModalLabel">New Post</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/script/backPost.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="photo" class="col-form-label">Image</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                    <div class="mb-3">
                        <label for="content" class="col-form-label">Description:</label>
                        <textarea class="form-control" id="content" name="content"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Choose the category:</label>
                        <select aria-label="Default select example" name="category">
                            <option value="math">Math</option>
                            <option value="informatics">Informatics</option>
                            <option value="phisics">Phisics</option>
                            <option value="science">Science</option>
                            <option value="chemistry">Chemistry</option>
                            <option value="biology">Biology</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                        <button type="button submit" class="btn btn-primary"
                                style="border:none;background-color: var(--color-primary);">Add
                            post</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<button type="button" class="btn btn-primary"
        style="border-radius:var(--border-radius);border:none;background-color: var(--color-primary);"
        data-bs-toggle="modal" data-bs-target="#modalPost">
    Create Post
</button>