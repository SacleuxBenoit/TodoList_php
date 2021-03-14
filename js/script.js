function deleteAccount(){
    let result = confirm("êtes vous sur de vouloire supprimer le compte ?");

    if(result){
        document.location.href="../Database/Settings/settings_delete_account.php";
    }
}
