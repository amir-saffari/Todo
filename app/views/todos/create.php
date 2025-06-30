<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="">Create todo</h5>
                    <a href="#" class="btn btn-dark">back</a>
                </div>

                <div class="card-body">
                    <form action="<?= URL_ROOT ?>/todos/store" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Text</label>
                            <input type="text" name = "text" class="form-control">
                            <div class="form-text text-danger">
                                <?php if (isset($_SESSION['form_errors']['text'])) : ?>
                                    <?= $_SESSION['form_errors']['text'] ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-secondary">Submit</button>
                        <?php if (isset($_SESSION['form_errors'])) : ?>
                            <?php unset($_SESSION['form_errors']) ?>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>