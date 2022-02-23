function get_count(){
    fetch('/users/count')
    .then((response) => {
        console.log(response.json());
    })
    document.querySelector('#usersconnecting');
}