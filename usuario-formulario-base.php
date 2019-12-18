<div class="container-fluid">

 <div class="form-group form-group-lg">

  <label class="col-sm-2 control-label" for="formGroupInputLarge">C.P.F</label>
  <input type="number" class="form-control input-lg"  placeholder="somente números" minlength="11" name="cpf" value="" id="cpf" required></br>
</div>

<div class="form-group form-group-lg">

  <label class="col-sm-2 control-label" for="formGroupInputLarge">Nome</label>
  <input type="text" class="form-control input-lg"  placeholder="Nome" name="nome" value="" id="nome" required></br>
</div>

<div class="form-group form-group-lg">

  <label class="col-sm-2 control-label" for="formGroupInputLarge">e-mail</label>
  <input type="email" class="form-control input-lg" aria-describedby="emailHelp" placeholder="seuemail@servidor.com" name="email" value="" id="email" required></br>
</div>

<div class="form-group">
  <label for="exampleFormControlSelect1">Tipo de Usuário</label>
  <select class="form-control"  id="combouser" name="usuario">
    <option value="0" selected>USUARIO</option>
    <option value="1">ADMINISTRADOR</option>
  </select>
</div>

<div class="form-group form-group-lg">
  <label class="col-sm-2 control-label" for="formGroupInputLarge">Senha</label>
  <input type="password" class="form-control input-lg" minlength="8" name="senha" id="senha" required></br>
</div>

<div class="form-group form-group-lg">
  <label class="col-sm-2 control-label" for="formGroupInputLarge">Repetir Senha</label>
  <input type="password" class="form-control input-lg" minlength="8" name="senha2" id="senha2" required></br>
</div>