<?php
    require_once 'View/PartialsViews/NavPrincipal.php';
?>
<div class="d-flex justify-content-center" style="margin-top: 5%;">
    <form action="" method="post" name="cadLogin" id="cadLogin" class="fieldForm  background-login">
                <h1 class="fw-bold fs-3 text-center">Logar</h1>
                <div class="d-flex flex-column">
                    <input type="text" name="login" id="login" class="my-3 " placeholder = "Login...">
                    <input type="password" name="senha" id="senha" class="my-3" placeholder = "Senha...">
                    <input type="hidden" name="permissao" id="permissao" value="">
                    <input type="submit" value="Logar" name="btnLogar" id="btnLogar">
                    <span id="cadastrar">Não tem uma conta? <a href="Index.php?page=cadastro">Cadastre-se</a></span>
                </div>
    </form>
</div>

<?php
if(isset($_POST["btnLogar"]))
{
    $_SESSION['logado'] = call_user_func(array('UsuarioController','logar'));
    $_SESSION['login'] = $_POST['login'];

    header('Location: Index.php');
}
?>