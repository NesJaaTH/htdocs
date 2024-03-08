const adminsetting = document.getElementById('adminsetting');
const logoutuser = document.getElementById('logoutuser');

logoutuser.addEventListener('click', () => {
    location.assign("http://localhost/assets/php/logout.php");
});

adminsetting.addEventListener('click', () => {
    location.assign("http://localhost/adminconfig/config.php");
});

