function deleteAccount(){
    let result = confirm("Êtes-vous sur de vouloire supprimer le compte ?");

    if(result){
        document.location.href="../Database/Settings/settings_delete_account.php";
    }
}


function deleteTodos(){
    let result = confirm("Êtes-vous sur de vouloire supprimer toutes les todos ?");

    if(result){
        document.location.href="../Database/Todos/todos_deleteAll_database.php";
    }
}