<div class="d-flex justify-content-center">
    <form action="" method="post" name="cadLogin" id="cadLogin" class="fieldForm">
        <h1 class="fw-bold fs-3 text-center">Logar</h1>
        <div class="d-flex flex-column">
            <input type="text" name="login" id="login" class="my-3 " placeholder = "Login...">
            <input type="password" name="senha" id="senha" class="my-3" placeholder = "Senha...">
            <input type="submit" value="Logar" name="btnLogar" id="btnLogar">
        </div>
    </form>
</div>

<?php
if(isset($_POST["btnLogar"]))
{
    $_SESSION['logado'] = call_user_func(array('UsuarioController','logar'));
    $_SESSION['login'] = $_POST['login'];

    header('Location: index.php');
}
?>