let buttonCategories = document.getElementById('buttonCategories');

// notify the user before deleting account 

function deleteAccount(){
    let result = confirm("Are you sure you want to delete your account ?");

    if(result){
        document.location.href="../Database/User/Settings/settings_delete_account.php";
    }
}

// notify the user before deleting todo 

function deleteTodos(){
    let result = confirm("Are you sure you want to delete all todos ?");

    if(result){
        document.location.href="../Database/Todos/todos_deleteAll_database.php";
    }
}

// Display input for create category
 
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