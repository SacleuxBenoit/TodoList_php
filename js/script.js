function deleteAccount(){
    let result = confirm("Êtes-vous sur de vouloire supprimer le compte ?");

    if(result){
        document.location.href="../Database/Settings/settings_delete_account.php";
    }
}
