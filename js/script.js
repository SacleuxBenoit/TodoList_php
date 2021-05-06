let buttonCategories = document.getElementById('buttonCategories');

function deleteAccount(){
    let result = confirm("Are you sure you want to delete your account ?");

    if(result){
        document.location.href="../Database/Settings/settings_delete_account.php";
    }
}

function deleteTodos(){
    let result = confirm("Are you sure you want to delete all todos ?");

    if(result){
        document.location.href="../Database/Todos/todos_deleteAll_database.php";
    }
}

function showForm(){
    document.getElementById('formHidden').style.visibility = "visible";

    if(buttonCategories.value == "+"){
        buttonCategories.textContent = " - ";
        buttonCategories.value = " - "
    }else{
        buttonCategories.textContent = "+";
        buttonCategories.value = "+";
        document.getElementById('formHidden').style.visibility = "hidden";
    }



}