<nav class="divCategories">
        <div>
            <p>
                <h2> Categories <button onclick="showForm()" id="buttonCategories" value="+">+</button> </h2> 
            </p>

            <form action="../Database/Categories/create_categories_database.php" id="formHidden" method="post" style='visibility:hidden'>
                <input type="text" id="newCategories" name="newCategories">
                <input type="submit" value="Submit">
            </form>

                <?php
                    $get_categories = $bdd->prepare('SELECT DISTINCT categories FROM create_todos WHERE id_user = :id_user ORDER BY categories');
                    $get_categories->bindParam('id_user', $_SESSION['id_user']);
                    $get_categories->execute();
    
                    while($display_categories = $get_categories->fetch()){
                        ?>
                            <div id="divCategories">
                                <ul>
                                    <li>
                                    <h2><a href="./categories.php?categories=<?php echo $display_categories['categories']?>" class="colorLink"> <?php echo $display_categories['categories'] ?> </a>
                                        | <a href="../Database/Categories/delete_categories_database.php?categories=<?php echo $display_categories['categories'] ?>" class="colorLink"> x</h2> </a>
                                    </li>
                                </ul>
                            </div>
                        <?php
                    }
                ?>

                <p class="navDeletedTasks">
                    <h2><a href="../layouts/deleted_tasks.php" class="colorLink">Deleted tasks</a></h2>
                </p>
        </div>
    </nav>