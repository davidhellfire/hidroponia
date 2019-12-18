<div class="container-fluid">

 <div class="form-group form-group-lg">

  <label class="col-sm-2 control-label" for="formGroupInputLarge">C.P.F</label>
  <input type="number" class="form-control input-lg"  placeholder="somente números" minlength="11" name="cpf" value="<?=$usuario['cpf']?>" required></br>
</div>

<div class="form-group form-group-lg">

  <label class="col-sm-2 control-label" for="formGroupInputLarge">Nome</label>
  <input type="text" class="form-control input-lg"  placeholder="Nome" name="nome" value="<?=$usuario['nome']?>" required></br>
</div>

<div class="form-group form-group-lg">

  <label class="col-sm-2 control-label" for="formGroupInputLarge">e-mail</label>
  <input type="email" class="form-control input-lg" aria-describedby="emailHelp" placeholder="seuemail@servidor.com" name="email" value="<?=$usuario['email']?>" required></br>
</div>
<?php if(intVal($usuario['tipousuario'])){
  $selecao1 = "selected = 'selected'";
  $selecao0 = "";
}else{
  $selecao0 = "selected = 'selected'";
  $selecao1 = "";
}
?>
<div class="form-group">
  <label for="exampleFormControlSelect1">Tipo de Usuário</label>
  <select class="form-control" name="usuario">
    <option value="0" <?= $selecao0?>>USUARIO</option>
    <option value="1" <?= $selecao1?>>ADMINISTRADOR</option>
  </select>
</div>
