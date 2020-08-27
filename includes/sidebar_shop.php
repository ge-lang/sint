<?php
        $categories = Categorie::find_all();?>
        <!-- Page Content -->
        <div class="container">

            <div class="row">

                <div class="col-lg-3">

                    <h1 class="my-4">Categorie</h1>
                    <div class="list-group">
                        <?php foreach ($categories as $categorie): ?>
                            <a href="#" class="list-group-item"><?php echo 'admin' . DS . $categorie->categorie_id; ?></a>

                        <?php endforeach; ?>
                    </div>

                </div>
