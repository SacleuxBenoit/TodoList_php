<nav class="divCategories">
        <div>
            <p>
                <h2> Categories <button onclick="showForm()" id="buttonCategories" value="+">+</button> </h2> 
            </p>

            <!--------------------- USER CAN CREATE A CATEGORY + CHOOSE THE MODE HERE ----------------------->
            <form action="http://localhost:8888/test/TodoList_php/Database/Categories/create_categories_database.php" id="formHidden" method="post" style='visibility:hidden'>
                <input type="text" id="newCategories" name="newCategories" placeholder="create your category here" minlength="2" maxlength="12" required>
                <input type="submit" value="Submit">
            </form>

                <?php
                    // -------------------- Display categories - START --------------------
                    $get_categories = $bdd->prepare('SELECT DISTINCT categories FROM todos WHERE id_user = :id_user AND is_delete = false ORDER BY categories');
                    $get_categories->bindParam('id_user', $_SESSION['id_user']);
                    $get_categories->execute();
    
                    while($display_categories = $get_categories->fetch()){
                        ?>
                            <div id="divCategories">
                                <ul>
                                    <li>
                                    <h2><a href="http://localhost:8888/test/TodoList_php/layouts/categories.php?categories=<?php echo $display_categories['categories']?>" class="colorLink"> <?php echo $display_categories['categories'] ?> </a>
                                        | <a href="http://localhost:8888/test/TodoList_php/Database/Categories/delete_categories_database.php?categories=<?php echo $display_categories['categories'] ?>" class="colorLink"> x</h2> </a>
                                    </li>
                                </ul>
                            </div>
                        <?php
                    }
                    // -------------------- Display categories - END --------------------
                ?>

                <p class="navDeletedTasks">
                    <h2><a href="http://localhost:8888/test/TodoList_php/layouts/todos/deleted_todos.php" class="colorLink">Deleted todos</a></h2>
                </p>

                <p class="navWhatsNew">
                    <h2><a href="http://localhost:8888/test/TodoList_php/layouts/News.php" class="linkToWhatsNew colorLink">What's new ?</a></h2>
                </p>
        </div>
    </nav>